<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/8/28
 * Time: 9:38
 */
namespace frontend\models;
/**
 * 标签的表单模型
 */
use frontend\models\base\BaseForm;
use Yii;
use common\models\Tags;
use yii\base\Model;

class TagFrom extends BaseForm
{
    public $id;
    public $tags;

    public function rules()
    {
        return [
            ['tags','required'],
            ['tags','each','rule' => ['string']],
        ];
    }

    public function saveTags(){
        $ids = [];
        if (!empty($this->tags)){
            foreach ($this->tags as $tag){
                $ids[] = $this->_saveTags($tag);
            }
        }
        return $ids;
    }

    private function _saveTags($tag){
        $model = new Tags();
        $res = $model->find()->where(['tag_name'=>$tag])->one();
        if (!$res){
            $model->tag_name = $tag;
            $model->news_num = 1;
            if (!$model->save()){
                throw new \Exception('保存标签失败！');
            }
            return $model->id;
        }else{
            $res->updateCounters(['news_num'=>1]);
        }
        return $res->id;
    }
}