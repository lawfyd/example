<?php

use yii\db\Migration;

/**
 * Class m171109_145838_insert__data_to_category_table
 */
class m171109_145838_insert__data_to_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('category', [
            'title' => 'Events',
            'description' => 'Events description',
            'slug' => 'events',
            'type' => 1,
            'meta_title' => 'Events',
            'meta_description' => 'Events meta description',
            'meta_keywords' => 'event, category',
        ]);
        $this->insert('category', [
            'title' => 'Private',
            'description' => 'Private description',
            'slug' => 'private',
            'type' => 2,
            'meta_title' => 'Private',
            'meta_description' => 'Private meta description',
            'meta_keywords' => 'private, category',
        ]);
        $this->insert('category', [
            'title' => 'Sport',
            'description' => 'Sport description',
            'slug' => 'sport',
            'type' => 1,
            'meta_title' => 'Sport',
            'meta_description' => 'Sport meta description',
            'meta_keywords' => 'sport, category',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171109_145838_insert__data_to_category_table cannot be reverted.\n";
        $this->delete('category', ['id' => 3]);
        $this->delete('category', ['id' => 4]);
        $this->delete('category', ['id' => 5]);

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171109_145838_insert__data_to_category_table cannot be reverted.\n";

        return false;
    }
    */
}
