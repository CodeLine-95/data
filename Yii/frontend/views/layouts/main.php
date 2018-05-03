<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('common','Blog'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    //左侧导航栏
    $leftMenus = [
        ['label' => Yii::t('common','Home'), 'url' => Yii::$app->homeUrl],
        ['label' => Yii::t('common','New'), 'url' => ['/news/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $rightMenus[] = ['label' => Yii::t('common','Signup'), 'url' => ['/site/signup']];
        $rightMenus[] = ['label' => Yii::t('common','Login'), 'url' => ['/site/login']];
    } else {
        $rightMenus[] = [
            'label' => '<img src="'.Yii::$app->params['avatar']['small01'].'" alt="'.Yii::$app->user->identity->username.'" title="'.Yii::$app->user->identity->username.'">',
            'linkOptions'  => ['class'  => 'avatar'],
            'items'  =>  [
                ['label' => '管理员('.Yii::$app->user->identity->username.')'],
                ['label' => '<i class="fa fa-sign-out"></i>退出','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ],
        ];
    }
    //左侧导航栏
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $leftMenus,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        //（encodeLabels'  => false）使用组件yii\widget\Menu输出的label内容带html时不会被解释
        'encodeLabels'  => false,
        'items' => $rightMenus,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    //实例化滚动条
    jQuery(document).ready(function () {
        $(".feed .nano").nanoScroller();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
