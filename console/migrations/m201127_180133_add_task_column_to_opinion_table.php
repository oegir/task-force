<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%opinion}}`.
 */
class m201127_180133_add_task_column_to_opinion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('opinion', 'task_id', $this->integer());

        $this->createIndex(
            'idx-opinion-task_id',
            'opinion',
            'task_id'
        );

        $this->addForeignKey(
            'fk-opinion-task_id',
            'opinion',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('opinion', 'task_id');

        $this->dropIndex(
            'idx-opinion-task_id',
            'opinion'
        );

        $this->dropForeignKey(
            'fk-opinion-task_id',
            'opinion'
        );
    }
}
