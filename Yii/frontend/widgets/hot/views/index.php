<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/30
 * Time: 8:56
 */
use yii\helpers\Url;
?>
<?php if(!empty($data)):?>
    <div class="panel">
        <div class="panel-title box-title">
            <span><strong><?=$data['title']?></strong></span>
        </div>
        <div class="panel-body hot-body">
            <?php foreach ($data['body'] as $list):?>
                <div class="clearfix hot-list">
                    <div class="pull-left media-left">
                        <span>浏览<em><?=$list['browser']?></em></span>
                    </div>
                    <div class="media-right">
                        <a href="<?=Url::to(['news/view','id'=>$list['id']])?>"><?=$list['title']?></a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php endif;?>
