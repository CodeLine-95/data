<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/29
 * Time: 10:45
 */
use yii\helpers\Url;
use frontend\widgets\hot\HotWidget;
$this->title = $data['title'];
$this->params['breadcrumbs'][] = ['label'=> '文章','url' => ['/news/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-9">
        <div class="page-title">
            <h1><?=$data['title']?></h1>
            <span>作者：<?=$data['user_name']?></span>
            <span>发布：<?=date('Y-m-d',$data['created_at']);?></span>
            <span>浏览：<?=isset($data['extend']['browser'])?$data['extend']['browser']:0?> 次</span>
        </div>
        <div class="page-content">
            <?=$data['content']?>
        </div>
        <div class="page-tag">
            标签：
            <?php foreach ($data['tags'] as $tag): ?>
                <span><a href="#"><?=$tag?></a></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel">
            <?php if (!Yii::$app->user->isGuest):?>
            <div class="btn-group" role="group">
                <a href="<?=Url::to(['news/create'])?>" class="btn btn-success btn-block">创建文章</a>
            </div>
            <?php endif;?>
        </div>
        <!--热门浏览-->
        <?=HotWidget::widget()?>
    </div>
</div>
