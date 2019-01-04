<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bildiriler`.
 */
class m190103_202904_create_bildiriler_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bildiriler', [
            'self_id' => $this->primaryKey(),
            'notice_id' => $this->integer()->notNull(),
            'header' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'date' => $this->date()->notNull(),
            'expired' => $this->date()->notNull()
        ]);

        //create index for notice_id from bildirituru table
        $this->createIndex(

            'idx-bildiriler-notice_id',
            'bildiriler',
            'notice_id'
            
        );

        // and now create foreign key
        $this->addForeignKey(

            'fk-bildiriler-notice_id',
            'bildiriler',
            'notice_id',
            'bildirituru',
            'notice_id',
            'CASCADE'
            
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-bildiriler-notice_id',
            'bildiriler'
        );

        $this->dropIndex(
            'idx-bildiriler-notice_id',
            'bildiriler'
        );

        $this->dropTable('bildiriler');
    }
}
