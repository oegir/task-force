<?php

use yii\db\Migration;

/**
 * Class m210121_172746_update_longitude_column_to_task_table
 */
class m210121_172746_update_longitude_column_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE task CHANGE `longitude` `longitude` DECIMAL(13,10)";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210121_172746_update_longitude_column_to_task_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210121_172746_update_longitude_column_to_task_table cannot be reverted.\n";

        return false;
    }
    */
}
