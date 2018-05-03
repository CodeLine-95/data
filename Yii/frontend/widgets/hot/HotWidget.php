<?php
/**
 * Created by PhpStorm.
 * User: Joe Handsome
 * Date: 2017/9/30
 * Time: 8:56
 */
namespace frontend\widgets\hot;
/**
 * 热门浏览组件
 */
use common\models\News;
use common\models\NewsExtends;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use yii\db\Query;

class HotWidget extends Widget
{
    /**
     * 文章列表的标题
     * @var unknown
     */
    public $title = '';

    /**
     * 显示条数
     * @var unknown
     */
    public $limit = 8;

    /**
     * 是否显示更多
     * @var unknown
     */
    public $more = true;

    /**
     * 是否显示分页
     * @var unknown
     */
    public $page = true;

    public function run()
    {
        $res = (new Query())
            ->select('a.browser, b.id, b.title')
            ->from(['a'=>NewsExtends::tableName()])
            ->join('LEFT JOIN',['b'=>News::tableName()],'a.news_id = b.id')
            ->where('b.is_valid = 0')
            ->orderBy('browser DESC, id DESC')
            ->limit($this->limit)
            ->all();

        $result['title'] = $this->title?:'热门浏览';
        $result['more'] = Url::to(['news/index','sort'=>'hot']);
        $result['body'] = $res?:[];

        return $this->render('index',['data'=>$result]);
    }
}