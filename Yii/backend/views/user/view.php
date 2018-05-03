<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '用户：'.$model->username;
$this->params['breadcrumbs'][] = ['label' => '会员信息', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status' => [
                'label' => '状态',
                'attribute' => 'status',
                'value' => function($model){
                    return ($model->status == 10)?'激活':'非激活';
                },
            ],
            'created_at'=> [
                'attribute' => 'created_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s',$model->created_at);
                }
            ],
            'updated_at'=> [
                'attribute' => 'updated_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s',$model->updated_at);
                }
            ],
        ],
    ]) ?>

</div>
