<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tags */

$this->title = '修改标签: ' . $model->tag_name;
$this->params['breadcrumbs'][] = ['label' => '标签管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tag_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="tags-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
