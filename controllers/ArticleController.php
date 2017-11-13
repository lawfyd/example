<?php

namespace app\controllers;

use app\models\Article;
use yii\web\HttpException;
use app\models\Category;

class ArticleController extends \yii\web\Controller
{

    /**
     * Страница одной статьи
     * @param string $catSlug  slug нужной категории
     * @param string $slug  slug нужной стаьи
     * @return mixed
     */
    public function actionView($catSlug, $slug)
    {
        $article = new Article;
        $model = $article->getArticleBySlug($slug);
        $categoryId = $model->category_id;
        $category = new Category;
        $category = $category->getCategoryById($categoryId);

        // add SEO tags
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->meta_description,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->meta_keywords,
        ]);

        if ($model === null) {
            throw new HttpException(404 ,'Article not found');
        }

        if($model->slug == $slug && $category->slug == $catSlug){
            return $this->render('view', [
                'model' => $model,
                'category' => $category,
            ]);
        } else{
            throw new HttpException(404 ,'Article not found');
        }
    }

}
