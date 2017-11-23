<?php $this->extend('Admin/layout'); ?>

<h2>Ответить на вопрос</h2>
<a href = '<?php echo Route::buildURL("Admin", "mainPage"); ?>'>Назад </a> <br />
<p><b>Имя</b><?php echo $this->Question->name;?><br />
<?php echo $this-> Question->text;?><br />
</p>
<form method="POST" action="<?php echo Route::buildURL("Admin", "saveAdd", array('id'=>$this->Question->id)); ?>">
     <?php
     echo'<p><textarea name="text" id="text"></textarea></p>'.
               "\n".'<script>$("textarea#text").elrte({
                    cssClass : \'el-rte\',
                lang     : \'ru\',
                    height   : 450,
                    toolbar  : \'complete\',
                    cssfiles : [\'/framework/plugins/eled/css/elrte-inner.css\'],
                    fmOpen : function(callback) {
                            $(\'<div id="myelfinder" />\').elfinder({
                                    url : \''.Route::buildFilePath('../helpers/elfm/connectors/php/connector.php').'\',
                                    lang : \'ru\',
                                    dialog : { width : 900, modal : true, title : \'Files\' }, // открываем в диалоговом окне
                                    closeOnEditorCallback : true, // закрываем после выбора файла
                                    editorCallback : callback // передаем callback файловому менеджеру
                            })
                    }
             });</script>';
             ?>
     <input type="submit" value="Сохранить" />
</form>
