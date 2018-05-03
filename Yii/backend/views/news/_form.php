<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord){?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model,'label_img')->widget('common\widgets\file_upload\FileUpload',[
            'config'=>[
            ]
        ]) ?>
        <?= $form->field($model,'content')->widget('common\widgets\ueditor\Ueditor',[
            'options'=>[
                'initialFrameHeight' => 400,
            ]
        ]) ?>

        <?= $form->field($model, 'cat_id')->textInput() ?>

    <?php }else{?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'is_valid')->dropDownList(['0'=>'无效','1'=>'有效']) ?>

    <?php }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
