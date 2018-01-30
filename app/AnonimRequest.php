<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnonimRequest extends Model
{
    protected $table = 'anonim_requests';

    public function user()
	{
		return $this->belongsTo(User::class);
	}
}
