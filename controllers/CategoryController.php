<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends \yii\web\Controller
{

    /**
     * Вывод списка статтей конкретной категории.
     * @param string $slug- slug нужной категории
     * @return mixed
     */
    public function actionView($slug)
    {
        $category = new Category();
        $category = $category->getCategoryBySlug($slug);

        // add SEO tags
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $category->meta_description,
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $category->meta_keywords,
        ]);

        if($category->type == 1 && $category->slug == $slug) {
            $article = new Article;
            $data = $article->getAll($category->id);
            return $this->render('view', [
                'models' => $data['articles'],
                'pages' => $data['pagination'],
                'category' => $category,
            ]);
        } else{
            throw new HttpException(404 ,'Category not found');
        }
    }
}
