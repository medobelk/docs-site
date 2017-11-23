$(document).ready(function(){
	html_markup();
	fonts_init();
	rotator_init();
});

function html_markup()
{
	$('.pane').wrap('<div class="pane_wraper" />');
	$('.pic_round').wrap('<div class="pic_round_" />').wrap('<div class="inner" />');
	$('.pic_round_').each(function(){
		var $in=$(this).children('.inner');
		var $img=$in.children('img');
		$in.css('width',$img.width()+'px');
		$in.css('height',$img.height()+'px');
		$(this).css('width',$img.width()+2+'px');
		$(this).css('height',$img.height()+2+'px');
		$in.css('background','url("'+$img.attr('src')+'") no-repeat');
		if($img.hasClass('left'))
			$(this).addClass('left');
		if($img.hasClass('right'))
			$(this).addClass('right');
		$img.remove();
	});
	
	$('.button').wrapInner('<span class="inner" />');
	
	$('.catalog > li > a').each(function(){
		var $img=$(this).children('img');
		if($img.length)
		{
			var name=$img.attr('alt');
			$(this).css('background','url("'+$img.attr('src')+'") no-repeat center center');
			if(name != '')
				$(this).append('<span class="name">'+name+'</span>');
			$img.remove();
		}
		
		var $hov=$(this).next('.hover');
		if($hov.length)
		{
			var dir='left';
			var pos=$(this).parent().position();
			if(pos.left > 0)
				dir='right';
			$hov.before('<div class="hover" style="height:'+$hov.height()+'px;width:'+$hov.width()+'px;background:url(\''+$hov.attr('src')+'\') no-repeat top left;bottom:0;'+dir+':'+$(this).outerWidth()+'px">&nbsp;</div>');
			$hov.remove();
			
			$(this).mouseenter(function(){
				$(this).next('.hover').stop(true,true).slideDown(100);
			});
			
			$(this).mouseleave(function(){
				$(this).next('.hover').stop(true,true).hide();
			});
		}
	});
}

function fonts_init()
{
	Cufon.replace('.phone', {
		textShadow: '1px 1px #000000'
	});
	Cufon.replace('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6', {
		textShadow: '1px 1px #ffffff'
	});
	
	Cufon.replace('.button');
}

function rotator_init()
{
	$('.rotator').each(function(){
			$(this).cycle({
				fx: 'scrollLeft',
				timeout:  6000,
				speed:    600,
				delay: Math.round(Math.random()*6000)
			});
	});
}