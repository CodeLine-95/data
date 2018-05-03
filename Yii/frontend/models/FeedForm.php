<?php
namespace frontend\models;

use frontend\models\base\BaseForm;
use Yii;
use yii\base\Model;
use common\models\Feeds;

/**
 * This is the model class for table "feeds".
 *
 * @property integer $id
 * @property string $content
 */
class FeedForm extends BaseForm
{
    public $content;
    
    public $_lastError;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '内容',
        ];
    }

    /**
     * 留言保存
     * @return bool
     */
    public function create()
    {
        try{
            $model = new Feeds();
            $model->user_id = Yii::$app->user->identity->id;
            $model->content = $this->content;
            $model->created_at = time();            
            if(!$model->save())
                throw new \Exception('保存失败！');
            return true;
        }catch (\Exception $e){
            $this->_lastError = $e->getMessage();
            return false;
        }
    }
    
    public function getList()
    {
        $model = new Feeds();
        $res = $model->find()->limit(10)->with('user')->orderBy(['id'=>SORT_DESC])->asArray()->all();
        
        return $res?:[];
    }
}
