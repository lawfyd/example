<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property integer $category_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'slug' => 'Slug',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Получаем все статьи конкретной категории + объект пагинации
     * @param integer $categoryId - id нужной категории
     * @param integer $pageSize - количество записей на странице
     * @return array массив статтей и обьект пагинации
     */
    public static function getAll($categoryId, $pageSize = 2)
    {
        // build a DB query to get all articles
        $query = Article::find()->where(['category_id' => $categoryId]);
        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize, 'forcePageParam' => false,
                'pageSizeParam' => false]);
        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }

    /**
     * Получаем стаью по slug
     * @param string $slug - slug нужной стаьи
     * @return object сатьи
     */
    public function getArticleBySlug($slug)
    {
        return Article::findOne(['slug' => $slug]);
    }
}
