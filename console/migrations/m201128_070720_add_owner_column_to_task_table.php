<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%task}}`.
 */
class m201128_070720_add_owner_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'owner_id', $this->integer());
        $this->createIndex(
            'idx-task-owner_id',
            'task',
            'owner_id'
        );

        $this->addForeignKey(
            'fk-task-owner_id',
            'task',
            'owner_id',
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
        $this->dropIndex(
            'idx-task-owner_id',
            'task'
        );

        $this->dropForeignKey(
            'fk-task-owner_id',
            'task'
        );

        $this->dropColumn('task', 'owner_id');
    }
}
