<?php

use yii\db\Migration;

/**
 * Class m201128_065435_add_foreign_key_to_task_file_table
 */
class m201128_065435_add_foreign_key_to_task_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-task_file-task_id',
            'task_file',
            'task_id'
        );

        $this->addForeignKey(
            'fk-task_file-task_id',
            'task_file',
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
        $this->dropIndex(
            'idx-task_file-task_id',
            'task_file'
        );

        $this->dropForeignKey(
            'fk-task_file-task_id',
            'task_file'
        );

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201128_065435_add_foreign_key_to_task_file_table cannot be reverted.\n";

        return false;
    }
    */
}
