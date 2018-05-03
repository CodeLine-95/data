<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tags */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($model->isNewRecord) {?>

    <?= $form->field($model, 'tag_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'news_num')->textInput() ?>

    <?php }else{?>

    <?= $form->field($model, 'tag_name')->textInput(['maxlength' => true]) ?>

    <?php }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
