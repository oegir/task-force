<?php

use yii\db\Migration;

/**
 * Class m201018_153322_create_junction_table_for_user_and_task
 */
class m201018_153322_create_junction_table_for_user_and_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_task', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'task_id' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_task-user_id',
            'user_task',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_task-user_id',
            'user_task',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `task_id`
        $this->createIndex(
            'idx-user_task-task_id',
            'user_task',
            'task_id'
        );

        // add foreign key for table `task`
        $this->addForeignKey(
            'fk-user_task-task_id',
            'user_task',
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

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_task-user_id',
            'user_task'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_task-user_id',
            'user_task'
        );

        // drops foreign key for table `task`
        $this->dropForeignKey(
            'fk-user_task-task_id',
            'user_task'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            'idx-user_task-task_id',
            'user_task'
        );

        echo "m201018_153322_create_junction_table_for_user_and_task cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201018_153322_create_junction_table_for_user_and_task cannot be reverted.\n";

        return false;
    }
    */
}
