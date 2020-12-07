<?php

use yii\db\Migration;

/**
 * Class m201116_154214_create_table_for_task_and_file
 */
class m201116_154214_create_table_for_task_and_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_file', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'file' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task_file');

        echo "m201116_154214_create_table_for_task_and_file cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201116_154214_create_table_for_task_and_file cannot be reverted.\n";

        return false;
    }
    */
}
