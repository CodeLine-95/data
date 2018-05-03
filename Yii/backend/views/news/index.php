<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
    <p>
        <?= Html::a('添加文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title' => [
                'attribute'  => 'title',
                'format'    => 'raw',
                'value'   => function($model){
                    return '<a href="http://www.yii.com'.Url::to(['news/view','id'=>$model->id]).'" target="_blank">'.$model->title.'</a>';
                },
            ],
            //'summary',
            //'content:ntext',
            //'label_img',
            'cat.cat_name',
            // 'user_id',
            'user_name',
            'is_valid' => [
                'attribute' => 'is_valid',
                'value'   => function($model){
                    return ($model->is_valid == 1)?'有效':'无效';
                },
                'filter' =>['0'=>'无效','1'=> '有效'],
            ],
            'created_at'=> [
                'attribute' => 'created_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s',$model->created_at);
                }
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
