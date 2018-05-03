<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/29
 * Time: 15:19
 */
namespace frontend\widgets\banner;
use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Url;

class BannerWiget extends Widget
{
    public $item = [];

    public function init()
    {
        if (empty($this->item)) {
            $this->item = [
                [
                    'label' => 'demo',
                    'image_url' => '/statics/images/banner/b_0.jpg',
                    'url' => ['site/index'],
                    'html'=> '',
                    'active'=> 'active',
                ],
                [
                    'label' => 'demo',
                    'image_url' => '/statics/images/banner/b_1.jpg',
                    'url' => ['site/index'],
                    'html'=> '',
                ],
                [
                    'label' => 'demo',
                    'image_url' => '/statics/images/banner/b_2.jpg',
                    'url' => ['site/index'],
                    'html'=> '',
                ],
                [
                    'label' => 'demo',
                    'image_url' => '/statics/images/banner/b_3.jpg',
                    'url' => ['site/index'],
                    'html'=> '',
                ],
            ];
        }

    }
    public function run()
    {
        $data['items'] = $this->item;
        return $this->render('index',['data'=>$data]);
    }
}