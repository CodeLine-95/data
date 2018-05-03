<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cats */

$this->title = '添加分类';
$this->params['breadcrumbs'][] = ['label' => '分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
