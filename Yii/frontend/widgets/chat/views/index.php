<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/29
 * Time: 16:42
 */
use yii\helpers\Url;
?>
<!--只言片语-->
<div class="panel">
    <div class="panel-title box-title">
        <span><strong>只言片语</strong></span>
        <span class="pull-right"><a href="#" class="font-12">more>></a></span>
    </div>
    <div class="panel-body">
        <form id="w0" action="/" method="post">
            <div class="form-group input-group field-feed-content required">
                <textarea id="feed-content" class="form-control" name="content" placeholder="我想说的留言....."></textarea>
                <span class="input-group-btn">
                    <button type="button" data-url="<?=Url::to('site/add-feed')?>" class="btn btn-success btn-feed j-feed">发布</button>
                </span>
            </div>
        </form>
        <div class="feed">
            <div class="nano has-scrollbar">
                <?php if(!empty($data['feed'])):?>
                    <ul class="media-list nano-content media-feed feed-index ps-container ps-active-y">
                        <?php foreach($data['feed'] as $list):?>
                            <li class="media">
                                <div class="media-left">
                                    <span rel="author" data-original-title="" title="<?=$list['user']['username']?>">
                                        <img style="width: 32px;height: 32px;" src="<?=Yii::$app->params['avatar']['small01']?>" alt="<?=$list['user']['username']?>">
                                    </span>
                                </div>
                                <div class="media-body" style="font-size: 12px;">
                                    <div class="media-content">
                                        <a href="<?=Url::to(['member/index','id'=>$list['user_id']])?>"><?=$list['user']['username']?></a>:<?=$list['content']?>
                                    </div>
                                    <div class="media-action">
                                        <?=date('Y-m-d h:i:s',$list['created_at'])?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
                <!--滚动条样式-->
                <div class="nano-pane">
                    <div class="nano-slider"></div>
                </div>
            </div>
        </div>
    </div>
</div>