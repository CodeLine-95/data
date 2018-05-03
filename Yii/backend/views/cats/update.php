<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cats */

$this->title = '修改分类: ' . $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => '分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cat_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改分类';
?>
<div class="cats-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
