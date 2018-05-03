<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/8/22
 * Time: 10:42
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\widgets\hot\HotWidget;
$this->title = '创建文章';
$this->params['breadcrumbs'][] = ['label'=> '文章','url' => ['/news/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title">
            <span>创建文章</span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($model,'title')->textInput(['maxlength'=>true]) ?>
            <?= $form->field($model,'cat_id')->dropDownList($cat) ?>
            <?= $form->field($model,'label_img')->widget('common\widgets\file_upload\FileUpload',[
                'config'=>[
                ]
            ]) ?>
            <?= $form->field($model,'content')->widget('common\widgets\ueditor\Ueditor',[
                'options'=>[
                    'initialFrameHeight' => 400,
                ]
            ]) ?>
            <?= $form->field($model,'tags')->widget('common\widgets\tags\TagWidget') ?>
            <div class="form-group">
                <?= Html::submitButton('发布文章', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
    <div class="col-lg-3">
        <!--热门浏览-->
        <?=HotWidget::widget()?>
    </div>
</div>
