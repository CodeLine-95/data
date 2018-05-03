<?php

namespace common\models;

use common\models\base\Base;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $tag_name
 * @property integer $news_num
 */
class Tags extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_num'], 'integer'],
            [['tag_name'], 'string', 'max' => 50],
            [['tag_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'tag_name' => '标签名',
            'news_num' => '文章数量',
        ];
    }
}
