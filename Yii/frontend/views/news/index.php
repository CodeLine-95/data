<?php
/* @var $this weyii\b\View */
use frontend\widgets\news\NewsWidget;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;
$this->title = '文章列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='row'>
    <div class="col-lg-9">
        <?=NewsWidget::widget()?>
    </div>
    <div class="col-lg-3">
        <!--热门浏览-->
        <?=HotWidget::widget()?>
        <!--标签云-->
        <?=TagWidget::widget()?>
    </div>
</div>
