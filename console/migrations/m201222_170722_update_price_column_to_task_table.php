<?php

use yii\db\Migration;

/**
 * Class m201222_170722_update_price_column_to_task_table
 */
class m201222_170722_update_price_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('task', 'price', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201222_170722_update_price_column_to_task_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201222_170722_update_price_column_to_task_table cannot be reverted.\n";

        return false;
    }
    */
}
