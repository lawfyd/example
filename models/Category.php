<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property integer $type
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['type'], 'integer'],
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
            'type' => 'Type',
        ];
    }

    /**
     * Получаем категорию по slug
     * @param string $slug- slug нужной категории
     * @return object обїект категории
     */
    public function getCategoryBySlug($slug)
    {
        return Category::findOne(['slug' => $slug]);
    }

    /**
     * Получаем категорию по id
     * @param integer $id- id нужной категории
     * @return object обїект категории
     */
    public function getCategoryById($id)
    {
        return Category::findOne($id);
    }

    /**
     * Получаем все категории
     * @return object категория
     */
    public function getAll()
    {
        return Category::find()->all();
    }
}
