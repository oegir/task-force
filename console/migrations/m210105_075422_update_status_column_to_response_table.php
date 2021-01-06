<?php

use yii\db\Migration;

/**
 * Class m210105_075422_update_status_column_to_response_table
 */
class m210105_075422_update_status_column_to_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "UPDATE `response` SET `status` = 'new'";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210105_075422_update_status_column_to_response_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210105_075422_update_status_column_to_response_table cannot be reverted.\n";

        return false;
    }
    */
}
