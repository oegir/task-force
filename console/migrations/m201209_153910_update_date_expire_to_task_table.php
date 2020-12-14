<?php

use yii\db\Migration;

/**
 * Class m201209_153910_update_date_expire_to_task_table
 */
class m201209_153910_update_date_expire_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE task CHANGE `date_expire` `date_expire` INT";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201209_153910_update_date_expire_to_task_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_153910_update_date_expire_to_task_table cannot be reverted.\n";

        return false;
    }
    */
}
