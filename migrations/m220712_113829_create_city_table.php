<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m220712_113829_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date_create' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
