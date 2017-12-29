<?php

namespace App\Http\Controllers;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

use Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use Illuminate\Support\Facades\Auth;
use App\Visit;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;

class VoyagerUsersController extends Controller
{
    use BreadRelationshipParser;
    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      Browse our Data Type (B)READ
    //
    //****************************************

    public function getSlug(Request $request)
    {
        if (isset($this->slug)) {
            $slug = $this->slug;
        } else {
            $slug = explode('.', $request->route()->getName())[1];
        }

        return $slug;
    }

    public function insertUpdateData($request, $slug, $rows, $data)
    {
        $multi_select = [];

        /*
         * Prepare Translations and Transform data
         */
        $translations = is_bread_translatable($data)
                        ? $data->prepareTranslations($request)
                        : [];

        foreach ($rows as $row) {
            $options = json_decode($row->details);

            if ($row->type == 'relationship' && $options->type != 'belongsToMany') {
                $row->field = @$options->column;
            }

            // if the field for this row is absent from the request, continue
            // checkboxes will be absent when unchecked, thus they are the exception
            if (!$request->hasFile($row->field) && !$request->has($row->field) && $row->type !== 'checkbox') {
                continue;
            }

            $content = $this->getContentBasedOnType($request, $slug, $row);

            /*
             * merge ex_images and upload images
             */
            if ($row->type == 'multiple_images' && !is_null($content)) {
                if (isset($data->{$row->field})) {
                    $ex_files = json_decode($data->{$row->field}, true);
                    if (!is_null($ex_files)) {
                        $content = json_encode(array_merge($ex_files, json_decode($content)));
                    }
                }
            }

            if (is_null($content)) {

                // If the image upload is null and it has a current image keep the current image
                if ($row->type == 'image' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the multiple_images upload is null and it has a current image keep the current image
                if ($row->type == 'multiple_images' && is_null($request->input($row->field)) && isset($data->{$row->field})) {
                    $content = $data->{$row->field};
                }

                // If the file upload is null and it has a current file keep the current file
                if ($row->type == 'file') {
                    $content = $data->{$row->field};
                }

                if ($row->type == 'password') {
                    $content = $data->{$row->field};
                }

            }

            if ($row->type == 'relationship' && $options->type == 'belongsToMany') {
                // Only if select_multiple is working with a relationship
                $multi_select[] = ['model' => $options->model, 'content' => $content, 'table' => $options->pivot_table];
            } else {
                $data->{$row->field} = $content;
            }
        }

        $data->role_id = is_null( $data->role_id ) ? 2 : $data->role_id;
        $data->save();

        // Save translations
        if (count($translations) > 0) {
            $data->saveTranslations($translations);
        }

        foreach ($multi_select as $sync_data) {
            $data->belongsToMany($sync_data['model'], $sync_data['table'])->sync($sync_data['content']);
        }

        return $data;
    }

    public function validateBread($request, $data)
    {
        $rules = [];
        $messages = [];

        foreach ($data as $row) {
            $options = json_decode($row->details);

            if (isset($options->validation)) {
                if (isset($options->validation->rule)) {
                    if (!is_array($options->validation->rule)) {
                        $rules[$row->display_name] = explode('|', $options->validation->rule);
                    } else {
                        $rules[$row->display_name] = $options->validation->rule;
                    }
                }

                if (isset($options->validation->messages)) {
                    foreach ($options->validation->messages as $key => $msg) {
                        $messages[$row->display_name.'.'.$key] = $msg;
                    }
                }
            }
        }

        return Validator::make($request, $rules, $messages);
    }

    public function getContentBasedOnType(Request $request, $slug, $row)
    {
        $content = null;
        switch ($row->type) {
            /********** PASSWORD TYPE **********/
            case 'password':
                $pass_field = $request->input($row->field);

                if (isset($pass_field) && !empty($pass_field)) {
                    return bcrypt($request->input($row->field));
                }

                break;

            /********** CHECKBOX TYPE **********/
            case 'checkbox':
                $checkBoxRow = $request->input($row->field);

                if (isset($checkBoxRow)) {
                    return 1;
                }

                $content = 0;

                break;

            /********** FILE TYPE **********/
            case 'file':
                if ($files = $request->file($row->field)) {
                    if (!is_array($files)) {
                        $files = [$files];
                    }
                    $filesPath = [];
                    foreach ($files as $key => $file) {
                        $filename = Str::random(20);
                        $path = $slug.'/'.date('FY').'/';
                        $file->storeAs(
                            $path,
                            $filename.'.'.$file->getClientOriginalExtension(),
                            config('voyager.storage.disk', 'public')
                        );
                        array_push($filesPath, [
                            'download_link' => $path.$filename.'.'.$file->getClientOriginalExtension(),
                            'original_name' => $file->getClientOriginalName(),
                        ]);
                    }

                    return json_encode($filesPath);
                }
            /********** MULTIPLE IMAGES TYPE **********/
            // no break
            case 'multiple_images':
                if ($files = $request->file($row->field)) {
                    /**
                     * upload files.
                     */
                    $filesPath = [];

                    $options = json_decode($row->details);

                    if (isset($options->resize) && isset($options->resize->width) && isset($options->resize->height)) {
                        $resize_width = $options->resize->width;
                        $resize_height = $options->resize->height;
                    } else {
                        $resize_width = 1800;
                        $resize_height = null;
                    }

                    foreach ($files as $key => $file) {
                        $filename = Str::random(20);
                        $path = $slug.'/'.date('FY').'/';
                        array_push($filesPath, $path.$filename.'.'.$file->getClientOriginalExtension());
                        $filePath = $path.$filename.'.'.$file->getClientOriginalExtension();

                        $image = Image::make($file)->resize(
                            $resize_width,
                            $resize_height,
                            function (Constraint $constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            }
                        )->encode($file->getClientOriginalExtension(), 75);

                        Storage::disk(config('voyager.storage.disk'))->put($filePath, (string) $image, 'public');

                        if (isset($options->thumbnails)) {
                            foreach ($options->thumbnails as $thumbnails) {
                                if (isset($thumbnails->name) && isset($thumbnails->scale)) {
                                    $scale = intval($thumbnails->scale) / 100;
                                    $thumb_resize_width = $resize_width;
                                    $thumb_resize_height = $resize_height;

                                    if ($thumb_resize_width != null) {
                                        $thumb_resize_width = $thumb_resize_width * $scale;
                                    }

                                    if ($thumb_resize_height != null) {
                                        $thumb_resize_height = $thumb_resize_height * $scale;
                                    }

                                    $image = Image::make($file)->resize(
                                        $thumb_resize_width,
                                        $thumb_resize_height,
                                        function (Constraint $constraint) {
                                            $constraint->aspectRatio();
                                            $constraint->upsize();
                                        }
                                    )->encode($file->getClientOriginalExtension(), 75);
                                } elseif (isset($options->thumbnails) && isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
                                    $crop_width = $thumbnails->crop->width;
                                    $crop_height = $thumbnails->crop->height;
                                    $image = Image::make($file)
                                        ->fit($crop_width, $crop_height)
                                        ->encode($file->getClientOriginalExtension(), 75);
                                }

                                Storage::disk(config('voyager.storage.disk'))->put(
                                    $path.$filename.'-'.$thumbnails->name.'.'.$file->getClientOriginalExtension(),
                                    (string) $image,
                                    'public'
                                );
                            }
                        }
                    }

                    return json_encode($filesPath);
                }
                break;

            /********** SELECT MULTIPLE TYPE **********/
            case 'select_multiple':
                $content = $request->input($row->field);

                if ($content === null) {
                    $content = [];
                } else {
                    // Check if we need to parse the editablePivotFields to update fields in the corresponding pivot table
                    $options = json_decode($row->details);
                    if (isset($options->relationship) && !empty($options->relationship->editablePivotFields)) {
                        $pivotContent = [];
                        // Read all values for fields in pivot tables from the request
                        foreach ($options->relationship->editablePivotFields as $pivotField) {
                            if (!isset($pivotContent[$pivotField])) {
                                $pivotContent[$pivotField] = [];
                            }
                            $pivotContent[$pivotField] = $request->input('pivot_'.$pivotField);
                        }
                        // Create a new content array for updating pivot table
                        $newContent = [];
                        foreach ($content as $contentIndex => $contentValue) {
                            $newContent[$contentValue] = [];
                            foreach ($pivotContent as $pivotContentKey => $value) {
                                $newContent[$contentValue][$pivotContentKey] = $value[$contentIndex];
                            }
                        }
                        $content = $newContent;
                    }
                }

                return json_encode($content);

            /********** IMAGE TYPE **********/
            case 'image':
                if ($request->hasFile($row->field)) {
                    $file = $request->file($row->field);
                    $options = json_decode($row->details);

                    $path = $slug.'/'.date('FY').'/';
                    if (isset($options->preserveFileUploadName) && $options->preserveFileUploadName) {
                        $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
                        $filename_counter = 1;

                        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
                        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                            $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
                        }
                    } else {
                        $filename = Str::random(20);

                        // Make sure the filename does not exist, if it does, just regenerate
                        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                            $filename = Str::random(20);
                        }
                    }

                    $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

                    if (isset($options->resize) && isset($options->resize->width) && isset($options->resize->height)) {
                        $resize_width = $options->resize->width;
                        $resize_height = $options->resize->height;
                    } else {
                        $resize_width = 1800;
                        $resize_height = null;
                    }

                    $image = Image::make($file)->resize(
                        $resize_width,
                        $resize_height,
                        function (Constraint $constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        }
                    )->encode($file->getClientOriginalExtension(), 75);

                    if ($this->is_animated_gif($file)) {
                        Storage::disk(config('voyager.storage.disk'))->put($fullPath, file_get_contents($file), 'public');
                        $fullPathStatic = $path.$filename.'-static.'.$file->getClientOriginalExtension();
                        Storage::disk(config('voyager.storage.disk'))->put($fullPathStatic, (string) $image, 'public');
                    } else {
                        Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public');
                    }

                    if (isset($options->thumbnails)) {
                        foreach ($options->thumbnails as $thumbnails) {
                            if (isset($thumbnails->name) && isset($thumbnails->scale)) {
                                $scale = intval($thumbnails->scale) / 100;
                                $thumb_resize_width = $resize_width;
                                $thumb_resize_height = $resize_height;

                                if ($thumb_resize_width != null && $thumb_resize_width != 'null') {
                                    $thumb_resize_width = intval($thumb_resize_width * $scale);
                                }

                                if ($thumb_resize_height != null && $thumb_resize_height != 'null') {
                                    $thumb_resize_height = intval($thumb_resize_height * $scale);
                                }

                                $image = Image::make($file)->resize(
                                    $thumb_resize_width,
                                    $thumb_resize_height,
                                    function (Constraint $constraint) {
                                        $constraint->aspectRatio();
                                        $constraint->upsize();
                                    }
                                )->encode($file->getClientOriginalExtension(), 75);
                            } elseif (isset($options->thumbnails) && isset($thumbnails->crop->width) && isset($thumbnails->crop->height)) {
                                $crop_width = $thumbnails->crop->width;
                                $crop_height = $thumbnails->crop->height;
                                $image = Image::make($file)
                                    ->fit($crop_width, $crop_height)
                                    ->encode($file->getClientOriginalExtension(), 75);
                            }

                            Storage::disk(config('voyager.storage.disk'))->put(
                                $path.$filename.'-'.$thumbnails->name.'.'.$file->getClientOriginalExtension(),
                                (string) $image,
                                'public'
                            );
                        }
                    }

                    return $fullPath;
                }
                break;

            /********** TIMESTAMP TYPE **********/
            case 'timestamp':
                $content = $request->input($row->field);
                if (in_array($request->method(), ['PUT', 'POST'])) {
                    if (empty($request->input($row->field))) {
                        $content = null;
                    } else {
                        $content = gmdate('Y-m-d H:i:s', strtotime($request->input($row->field)));
                    }
                }
                break;

            /********** COORDINATES TYPE **********/
            case 'coordinates':
                if (empty($coordinates = $request->input($row->field))) {
                    $content = null;
                } else {
                    //DB::connection()->getPdo()->quote won't work as it quotes the
                    // lat/lng, which leads to wrong Geometry type in POINT() MySQL constructor
                    $lat = (float) ($coordinates['lat']);
                    $lng = (float) ($coordinates['lng']);
                    $content = DB::raw('ST_GeomFromText(\'POINT('.$lat.' '.$lng.')\')');
                }
                break;

            case 'relationship':

                    return $request->input($row->field);

                break;

            /********** ALL OTHER TEXT TYPE **********/
            default:
                $value = $request->input($row->field);
                $options = json_decode($row->details);
                if (isset($options->null)) {
                    return $value == $options->null ? null : $value;
                }

                return $value;
        }

        return $content;
    }

    private function is_animated_gif($filename)
    {
        $raw = file_get_contents($filename);

        $offset = 0;
        $frames = 0;
        while ($frames < 2) {
            $where1 = strpos($raw, "\x00\x21\xF9\x04", $offset);
            if ($where1 === false) {
                break;
            } else {
                $offset = $where1 + 1;
                $where2 = strpos($raw, "\x00\x2C", $offset);
                if ($where2 === false) {
                    break;
                } else {
                    if ($where1 + 8 == $where2) {
                        $frames++;
                    }
                    $offset = $where2 + 1;
                }
            }
        }

        return $frames > 1;
    }

    public function deleteFileIfExists($path)
    {
        if (Storage::disk(config('voyager.storage.disk'))->exists($path)) {
            Storage::disk(config('voyager.storage.disk'))->delete($path);
            event(new FileDeleted($path));
        }
    }

    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.

        $authUser = Auth::user();

        $slug = $this->getSlug($request);

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('browse', app($dataType->model_name));

        $getter = $dataType->server_side ? 'paginate' : 'get';

        $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];
        $searchable = $dataType->server_side ? array_keys(SchemaManager::describeTable(app($dataType->model_name)->getTable())->toArray()) : '';
        $orderBy = $request->get('order_by');
        $sortOrder = $request->get('sort_order', null);

        // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model::select('*');

            $relationships = $this->getRelationships($dataType);

            // If a column has a relationship associated with it, we do not want to show that field
            $this->removeRelationshipField($dataType, 'browse');

            if ($search->value && $search->key && $search->filter) {
                $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';
                $query->where($search->key, $search_filter, $search_value);
            }

            if ($orderBy && in_array($orderBy, $dataType->fields())) {
                $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'DESC';

                if( $authUser->role_id === 1 ){
                    $dataTypeContent = call_user_func([
                        $query->with($relationships)->orderBy($orderBy, $querySortOrder),
                        $getter,
                    ]);
                }else{
                    $dataTypeContent = call_user_func([
                        $query->where('role_id', 2)->with($relationships)->orderBy($orderBy, $querySortOrder),
                        $getter,
                    ]);
                }

            } elseif ($model->timestamps) {
                if( $authUser->role_id === 1 ){
                    $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter]);
                }else{
                    $dataTypeContent = call_user_func([$query->where('role_id', 2)->latest($model::CREATED_AT), $getter]);
                }
            } else {
                if( $authUser->role_id === 1 ){
                    $dataTypeContent = call_user_func([$query->with($relationships)->orderBy($model->getKeyName(), 'DESC'), $getter]);
                }else{
                    $dataTypeContent = call_user_func([$query->where('role_id', 2)->with($relationships)->orderBy($model->getKeyName(), 'DESC'), $getter]);
                }
            }

            // Replace relationships' keys for labels and create READ links if a slug is provided.
            $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
        } else {
            // If Model doesn't exist, get data from table name
            $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
            $model = false;
        }

        // Check if BREAD is Translatable
        if (($isModelTranslatable = is_bread_translatable($model))) {
            $dataTypeContent->load('translations');
        }

        // Check if server side pagination is enabled
        $isServerSide = isset($dataType->server_side) && $dataType->server_side;

        $view = 'voyager::bread.browse';

        if (view()->exists("voyager::$slug.browse")) {
            $view = "voyager::$slug.browse";
        }

        return Voyager::view($view, compact(
            'dataType',
            'dataTypeContent',
            'isModelTranslatable',
            'search',
            'orderBy',
            'sortOrder',
            'searchable',
            'isServerSide'
        ));
    }

    //***************************************
    //                _____
    //               |  __ \
    //               | |__) |
    //               |  _  /
    //               | | \ \
    //               |_|  \_\
    //
    //  Read an item of our Data Type B(R)EAD
    //
    //****************************************

    public function show(Request $request, $id)
    {
    	$visits = Visit::where('user_id', $id)->with('analyzes')->get();
    	
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $relationships = $this->getRelationships($dataType);
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $dataTypeContent = call_user_func([$model->with($relationships), 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager_custom.patients.read';

        if (view()->exists("voyager_custom.$slug.read")) {
            $view = "voyager_custom.$slug.read";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'visits'));
    }

    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {

        $authUser = Auth::user();

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $relationships = $this->getRelationships($dataType);

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? app($dataType->model_name)->with($relationships)->findOrFail($id)
            : DB::table($dataType->name)->where('id', $id)->first(); // If Model doest exist, get data from table name

        foreach ($dataType->editRows as $key => $row) {
            $details = json_decode($row->details);

            if ( $authUser->role_id !== 1 && $row->field === 'user_belongsto_role_relationship' || $row->field === 'role_id'){
                unset($dataType->editRows[$key]);
                continue;
            }
            
            $dataType->editRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            event(new BreadDataUpdated($dataType, $data));

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager.generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    public function create(Request $request)
    {
        $authUser = Auth::user();

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        foreach ($dataType->addRows as $key => $row) {
            $details = json_decode($row->details);

            if ( $authUser->role_id !== 1 && $row->field === 'user_belongsto_role_relationship' || $row->field === 'role_id'){
                unset($dataType->addRows[$key]);
                continue;
            }

            $dataType->addRows[$key]['col_width'] = isset($details->width) ? $details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {

            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());
            $user = $request->all();

            event(new BreadDataAdded($dataType, $data));

            Mail::to( $user['email'] )->send( new UserRegistered( $user ) );

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager.generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }
    }

    //***************************************
    //                _____
    //               |  __ \
    //               | |  | |
    //               | |  | |
    //               | |__| |
    //               |_____/
    //
    //         Delete an item BREA(D)
    //
    //****************************************

    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('delete', app($dataType->model_name));

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL or Model Binding
            $ids[] = $id instanceof Model ? $id->{$id->getKeyName()} : $id;
        }
        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
            $this->cleanup($dataType, $data);
        }

        $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager.generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager.generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }

    /**
     * Remove translations, images and files related to a BREAD item.
     *
     * @param \Illuminate\Database\Eloquent\Model $dataType
     * @param \Illuminate\Database\Eloquent\Model $data
     *
     * @return void
     */
    protected function cleanup($dataType, $data)
    {
        // Delete Translations, if present
        if (is_bread_translatable($data)) {
            $data->deleteAttributeTranslations($data->getTranslatableAttributes());
        }

        // Delete Images
        $this->deleteBreadImages($data, $dataType->deleteRows->where('type', 'image'));

        // Delete Files
        foreach ($dataType->deleteRows->where('type', 'file') as $row) {
            $files = json_decode($data->{$row->field});
            if ($files) {
                foreach ($files as $file) {
                    $this->deleteFileIfExists($file->download_link);
                }
            }
        }
    }

    /**
     * Delete all images related to a BREAD item.
     *
     * @param \Illuminate\Database\Eloquent\Model $data
     * @param \Illuminate\Database\Eloquent\Model $rows
     *
     * @return void
     */
    public function deleteBreadImages($data, $rows)
    {
        foreach ($rows as $row) {
            $this->deleteFileIfExists($data->{$row->field});

            $options = json_decode($row->details);

            if (isset($options->thumbnails)) {
                foreach ($options->thumbnails as $thumbnail) {
                    $ext = explode('.', $data->{$row->field});
                    $extension = '.'.$ext[count($ext) - 1];

                    $path = str_replace($extension, '', $data->{$row->field});

                    $thumb_name = $thumbnail->name;

                    $this->deleteFileIfExists($path.'-'.$thumb_name.$extension);
                }
            }
        }

        if ($rows->count() > 0) {
            event(new BreadImagesDeleted($data, $rows));
        }
    }
}
