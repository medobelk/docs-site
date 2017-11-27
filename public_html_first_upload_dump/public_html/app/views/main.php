<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php $this->_('title', 'Home'); ?></title>
    <?=$this->_('moreStyles', '', true);?>
    <link href="<?=Route::buildFilePath("css/main.css");?>" rel="stylesheet" media="all" />
</head>
<body>
		<a class="logo" href="/"></a>
		<a class="about" href="<?=Route::buildURL("Pagec", "view", array('name'=>'about'));?>"></a>
		<a class="qa" href="<?=Route::buildURL("QA", "form");?>"></a>
		<!--a class="copyright" href="#"></a-->
		
		<a class="lech" href="<?=Route::buildURL("Pagec", "view", array('name'=>'methods'));?>"></a>
		<a class="zaraza" href="<?=Route::buildURL("Pagec", "view", array('name'=>'hvor'));?>"></a>
		
		<div class="content">
			<div class="content-top"></div>
			<div class="content-middle">
				<?php $this->doLayout(); ?>
			</div>
			<div class="content-bottom"></div>
	


<!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=12873142&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/12873142/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="яндекс.ћетрика" title="яндекс.ћетрика: данные за сегодн€ (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:12873142,type:0,lang:'ru'});return false}catch(e){}"/></a>
<!-- /Yandex.Metrika informer -->


	</div>



<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter12873142 = new Ya.Metrika({id:12873142, enableAll: true, ut:"noindex", webvisor:true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/12873142?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>
</html>
