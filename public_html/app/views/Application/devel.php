<?php 
    $this->extend("main");
    $this->moreStyles = '';

    $news = CatalogItem::findByCriteria(Criteria::newInstance()->add(Field::newField("new"), "=", 1));
    $saless = CatalogItem::findByCriteria(Criteria::newInstance()->add(Field::newField("saless"), "=", 1));
?>

<div class="col2">
        <div class="pane">
			<h2 style="color:#660000">Проектирование и реализация CMS:</h2>
			<img src="<?=Route::buildFilePath("img/astek_logo.png");?>" style="vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;margin:5px 5px 5px 5px" height="35" width="127">
			<br>
			<div><strong>Лемешев Андрей</strong></div>
			<div><img src="http://status.icq.com/online.gif?icq=429490054&amp;img=27?rand=<?=rand();?>" style="vertical-align:baseline;margin-top:5px;margin-right:5px;margin-left:5px" height="16" width="16">429490054  </div>
			<div><a href="skype:andrey_favt"><img src="http://mystatus.skype.com/smallicon/andrey_favt?rand=<?=rand();?>" style="vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial;margin:5px 5px 0px 5px" height="16" width="16">andrey_favt</a></div>
			<div><img src="<?=Route::buildFilePath("img/mail-icon.png");?>" style="margin-top:5px;margin-right:5px;margin-left:5px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-style:initial" height="11" width="14"><a href="mailto:astek@xakep.ru">astek@xakep.ru</a>  <br></div><div><strong>Тел.</strong><span style="font-weight:bold">:</span> +3 (050) 85-62-084</div>
        </div>
</div>
<div class="col3">
        <div class="pane">
                <h2 class="red"><span>Новинки</span></h2>
                <div class="hr"></div>
                <ul class="rotator" style="height:120px">
					<?php foreach ($news as $item) {?>
                        <li><img src="<?=Route::buildURL("ImageProcessor", "picture", array("width"=>60, "height"=>106))."&url=".$item->photo;?>" class="img_left"><b><?=$item->title;?></b> <?=$item->describe;?></li>
					<? } ?>		
                </ul>
                <div class="clear"></div>
        </div>
        <div class="clear" style="height:20px"></div>
        <div class="pane">
                <h2><span>Распродажа</span></h2>
                <div class="hr"></div>
                <ul class="rotator" style="height:150px">                        
						<?php
							foreach ($saless as $item) {?><li>
                                <img src="<?=Route::buildURL("ImageProcessor", "picture", array("width"=>60, "height"=>106))."&url=".$item->photo;?>" class="img_left">
								<b><?=$item->title;?></b>
                                <br/><br/><span class="button blue"><?=$item->price==""?0:$item->price;?> руб.</span>
                                <br/><br/><a href="<?=Route::buildURL("Catalog", "page", array('id'=>$item->id));?>" class="button orange">Подробнее &gt;</a>
						</li><? } ?>
                </ul>
        </div>
        <div class="clear" style="height:20px"></div>
        <?php
            $news = DBA::buildDB()->query(Query::select("news")->addOrder(
                    Ordering::newInstance()->add(Field::newField("date"), "DESC")->add(Field::newField("id"), "DESC")
                            )->limit(0, 3))->fetch();
        ?>
        <div class="pane">
                <h2><span>Новости</span> компании</h2>
                <div class="hr"></div>
                <?php
                        foreach ($news as $item) {?>
                            <div class="news_item">
                                    <div class="date"><?=russian_date($item['date']);?></div>
                                    <div class="name"><?=$item['title'];?></div>
                                    <div class="short"><p><?=$item['describe'];?>...</p></div>
                                    <div class="clear"></div>
                                    <a href="<?=Route::buildURL("Application", "newsPage", array('id'=>$item['id']));?>" class="button orange">Подробнее &gt;</a>
                            </div>                            
                        <?}
                ?>

        </div>
</div>