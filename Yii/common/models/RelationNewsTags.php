<?php

namespace common\models;

use common\models\base\Base;
use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "relation_news_tags".
 *
 * @property integer $id
 * @property integer $news_id
 * @property integer $tag_id
 */
class RelationNewsTags extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relation_news_tags';
    }

    public function getTag()
    {
        return $this->hasOne(Tags::className(),['id'=>'tag_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'tag_id'], 'integer'],
            [['tag_id', 'news_id'], 'unique', 'targetAttribute' => ['tag_id', 'news_id'], 'message' => 'The combination of News ID and Tag ID has already been taken.'],
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
            'tag_id' => 'Tag ID',
        ];
    }
}
