<?php

use yii\db\Migration;

/**
 * Class m171109_162337_insert_data_to_article_table
 */
class m171109_162337_insert_data_to_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        for($i = 1; $i <= 5; $i++){
            $this->insert('article', [
                'title' => 'Event ' . $i,
                'description' => 'Event' . $i . ' description',
                'slug' => 'event' . $i,
                'category_id' => 3,
                'meta_title' => 'Event ' . $i,
                'meta_description' => 'Event' . $i . ' meta description',
                'meta_keywords' => 'event'. $i . ', event, page',
            ]);
            $this->insert('article', [
                'title' => 'Private ' . $i,
                'description' => 'Private' . $i . ' description',
                'slug' => 'private' . $i,
                'category_id' => 4,
                'meta_title' => 'Private ' . $i,
                'meta_description' => 'Private' . $i . ' meta description',
                'meta_keywords' => 'private'. $i . ', private, page',
            ]);
            $this->insert('article', [
                'title' => 'Sport ' . $i,
                'description' => 'Sport' . $i . ' description',
                'slug' => 'sport' . $i,
                'category_id' => 5,
                'meta_title' => 'Sport ' . $i,
                'meta_description' => 'Sport' . $i . ' meta description',
                'meta_keywords' => 'sport'. $i . ', sport, page',
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171109_162337_insert_data_to_article_table cannot be reverted.\n";
        for($i = 83; $i <= 97; $i++){
            $this->delete('article', ['id' => $i]);
        }
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171109_162337_insert_data_to_article_table cannot be reverted.\n";

        return false;
    }
    */
}
