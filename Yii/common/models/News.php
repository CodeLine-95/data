<?php

namespace common\models;

use common\models\base\Base;
use Yii;
use yii\db\ActiveRecord;

/**
 * News model
 *
 * @property string $id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property string $label_img
 * @property integer $cat_id
 * @property integer $user_id
 * @property string $user_name
 * @property integer $is_valid
 * @property integer $created_at
 * @property integer $updated_at
 */
class News extends Base
{
    const IS_VALID = 1;
    const NO_VALID = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public function getRelate()
    {
        return $this->hasMany(RelationNewsTags::className(), ['news_id'=>'id']);
    }

    public function getExtend()
    {
        return $this->hasOne(NewsExtends::className(),['news_id'=>'id']);
    }

    public function getCat()
    {
        return $this->hasOne(Cats::className(),['id'=>'cat_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'summary', 'content', 'cat_id', 'user_id', 'user_name', 'created_at', 'updated_at'], 'required'],
            ['content', 'string'],
            [['cat_id', 'user_id', 'is_valid', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary', 'label_img', 'user_name'], 'string', 'max' => 255],
            [['cat_id', 'is_valid'], 'unique', 'targetAttribute' => ['cat_id', 'is_valid'], 'message' => 'The combination of Cat ID and Is Valid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'title' => '标题',
            'summary' => '简介',
            'content' => '内容',
            'label_img' => '表情图',
            'cat_id' => '分类',
            'user_id' => '用户编号',
            'user_name' => '用户名',
            'is_valid' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
