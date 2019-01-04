<?php

use yii\db\Migration;

/**
 * Handles the creation of table `applicant`.
 */
class m190103_202918_create_applicant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('applicant', [

            'applicant_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'notice_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'experienceforjob' => $this->text()->notNull(),
            'cvfilelink' => $this->string()->notNull(),
            'about_yourself' => $this->text()->notNull()

        ]);

        $this->createIndex(

            'idx-applicant-user_id',
            'applicant',
            'user_id'
            
        );

        $this->createIndex(

            'idx-applicant-notice_id',
            'applicant',
            'notice_id'
            
        );

        $this->addForeignKey(

            'fk-applicant-user_id',
            'applicant',
            'user_id',
            'user',
            'id',
            'CASCADE'
            
            );

        $this->addForeignKey(

            'fk-applicant-notice_id',
            'applicant',
            'notice_id',
            'bildiriler',
            'self_id',
            'CASCADE'
            
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-applicant-user_id',
            'applicant'
        );

        $this->dropIndex(
            'idx-applicant-user_id',
            'applicant'
        );

        $this->dropForeignKey(
            'fk-applicant-notice_id',
            'applicant'
        );

        $this->dropIndex(
            'idx-applicant-notice_id',
            'applicant'
        );

        $this->dropTable('applicant');
    }
}
