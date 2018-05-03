<?php

namespace common\models;

use common\models\base\Base;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cats".
 *
 * @property string $id
 * @property string $cat_name
 */
class Cats extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name'], 'required'],
            [['cat_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'cat_name' => '分类名',
        ];
    }

    /**
     * 获取分类
     * @return array|Cats[]|\yii\db\ActiveRecord[]
     */
    public static function getAllCats(){
        $res = self::find()->asArray()->all();
        if ($res){
            foreach ($res as $key=>$list){
                $cat[$list['id']] = $list['cat_name'];
            }
        }else{
            $cat = ['0'=>'暂无分类'];
        }
        return $cat;
    }
}
