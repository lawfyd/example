<?php

use yii\db\Migration;

/**
 * Handles adding position to table `category`.
 */
class m171109_144014_add_position_column_to_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('category', 'meta_title', $this->string());
        $this->addColumn('category', 'meta_description', $this->string());
        $this->addColumn('category', 'meta_keywords', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('category', 'meta_title');
        $this->dropColumn('category', 'meta_description');
        $this->dropColumn('category', 'meta_keywords');
    }
}
