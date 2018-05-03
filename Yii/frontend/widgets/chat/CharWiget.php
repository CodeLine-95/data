<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/29
 * Time: 16:42
 */
namespace frontend\widgets\chat;
/**
 * 留言板组件
 */
use frontend\models\FeedForm;
use yii\bootstrap\Widget;

class CharWiget extends Widget
{
    public function run()
    {
        $feed = new FeedForm();
        $data['feed'] = $feed->getList();
        return $this->render('index',['data'=>$data]);
    }
}