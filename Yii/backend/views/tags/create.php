<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tags */

$this->title = '添加标签';
$this->params['breadcrumbs'][] = ['label' => '标签管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
