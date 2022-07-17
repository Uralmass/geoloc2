<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m220712_115734_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'id_city' => $this->integer(),
            'title' => $this->string(),
            'text' => $this->text(),
            'rating' => $this->integer(),
            'img' => $this->string(),
            'id_author' => $this->integer(),
            'date_create' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%review}}');
    }
}
