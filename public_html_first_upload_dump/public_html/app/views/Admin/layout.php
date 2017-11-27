<html>
<head>
    <link href="<?php echo Route::buildFilePath('css/admin.main.css'); ?>" rel="stylesheet" media="all" />
    <script type="text/javascript" src="<?php echo Route::buildFilePath('../helpers/eled/js/jquery-1.4.4.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Route::buildFilePath('../helpers/eled/js/jquery-ui-1.8.7.custom.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Route::buildFilePath('../helpers/eled/js/elrte.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Route::buildFilePath('../helpers/elfm/js/elfinder.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Route::buildFilePath('../helpers/elfm/js/i18n/elfinder.ru.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo Route::buildFilePath('../helpers/eled/js/i18n/elrte.ru.js'); ?>"></script>

    <link rel="stylesheet" href="<?php echo Route::buildFilePath('../helpers/eled/css/smoothness/jquery-ui-1.8.7.custom.css'); ?>" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php echo Route::buildFilePath('../helpers/eled/css/elrte.min.css'); ?>" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?php echo Route::buildFilePath('../helpers/elfm/css/elfinder.css'); ?>" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript" charset="utf-8"> 
        $().ready(function() {
            $("a#fm").click(function(){
                var fc = $('<div id="finderm">finder</div>');
                $("div#fm").append(fc);
                var f = $('#finderm').elfinder({
                        url : '/app/helpers/elfm/connectors/php/connector.php',
                        lang : 'ru',
                        //docked : true,
                        //height: 490,
                        //width: '100%',
                        dialog : { width : 900, modal : true, title : 'Files' },
                        onClose: function(){$("div#fm").html("");}
                });
                return false;
            });
        });
</script> 
</head>
<body>
	<h1>Админ панель</h1>
	<?php $this->doLayout(); ?>

	<div class="hr"></div>
	<div class="footer">Made by AStek</div>
</body>
</html>