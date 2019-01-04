<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bildirituru`.
 */
class m190103_202607_create_bildirituru_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bildirituru', [
            'notice_id' => $this->primaryKey(),
            'category' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bildirituru');
    }
}
