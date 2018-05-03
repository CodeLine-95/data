<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tags */

$this->title = $model->tag_name;
$this->params['breadcrumbs'][] = ['label' => '标签管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('common','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tag_name',
            'news_num',
        ],
    ]) ?>

</div>
