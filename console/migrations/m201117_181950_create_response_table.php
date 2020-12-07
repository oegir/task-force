<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%response}}`.
 */
class m201117_181950_create_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%response}}', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date_add' => $this->date()->notNull(),
            'price' => $this->integer()->notNull(),
            'description' => $this->text(),
        ]);

        $this->createIndex(
            'idx-response-task_id',
            'response',
            'task_id'
        );

        $this->addForeignKey(
            'fk-response-task_id',
            'response',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-response-user_id',
            'response',
            'user_id'
        );

        $this->addForeignKey(
            'fk-response-user_id',
            'response',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-response-task_id',
            'response'
        );

        $this->dropIndex(
            'idx-response-task_id',
            'response'
        );

        $this->dropForeignKey(
            'fk-response-user_id',
            'response'
        );

        $this->dropIndex(
            'idx-response-user_id',
            'response'
        );

        $this->dropTable('{{%response}}');
    }
}
