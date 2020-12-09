<?php

use yii\db\Migration;

/**
 * Class m201209_153237_update_date_add_to_response_table
 */
class m201209_153237_update_date_add_to_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE response CHANGE `date_add` `date_add` INT";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201209_153237_update_date_add_to_response_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_153237_update_date_add_to_response_table cannot be reverted.\n";

        return false;
    }
    */
}
