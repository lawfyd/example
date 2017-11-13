<?php

use yii\db\Migration;

/**
 * Handles adding position to table `article`.
 */
class m171109_143527_add_position_column_to_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('article', 'meta_title', $this->string());
        $this->addColumn('article', 'meta_description', $this->string());
        $this->addColumn('article', 'meta_keywords', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('article', 'meta_title');
        $this->dropColumn('article', 'meta_description');
        $this->dropColumn('article', 'meta_keywords');
    }
}
