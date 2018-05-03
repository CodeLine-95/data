<?php

namespace common\models;

use common\models\base\Base;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news_extends".
 *
 * @property integer $id
 * @property integer $news_id
 * @property integer $browser
 * @property integer $collect
 * @property integer $praise
 * @property integer $comment
 */
class NewsExtends extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_extends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'browser', 'collect', 'praise', 'comment'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'browser' => 'Browser',
            'collect' => 'Collect',
            'praise' => 'Praise',
            'comment' => 'Comment',
        ];
    }

    /**
     * 更新文章统计
     * @param $cond
     * @param $attibute
     * @param $num
     */
    public function upCounter($cond, $attibute, $num)
    {
        $conter = $this->findOne($cond);
        if (!$conter){
            $this->setAttributes($cond);
            $this->$attibute = $num;
            $this->save();
        }else{
            $countData[$attibute] = $num;
            $conter->updateCounters($countData);
        }
    }
}
