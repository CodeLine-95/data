<?php
use yii\base\Widget;
use frontend\widgets\banner\BannerWiget;
use frontend\widgets\news\NewsWidget;
use frontend\widgets\chat\CharWiget;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;
$this->title = '博客系统-首页';
?>
<div class="row">
    <div class="col-lg-9">
        <!--图片轮播-->
        <?=BannerWiget::widget()?>

        <!--文章列表-->
        <?=NewsWidget::widget()?>
    </div>
    <div class="col-lg-3">
        <!--留言板-->
        <?=CharWiget::widget()?>
        <!--热门浏览-->
        <?=HotWidget::widget()?>
        <!--标签云-->
        <?=TagWidget::widget()?>
    </div>
</div>