<?php

use yii\db\Migration;

/**
 * Class m201209_075242_update_updated_at_column_to_user_table
 */
class m201209_075242_update_updated_at_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE user CHANGE `updated_at` `updated_at` INT";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201209_075242_update_updated_at_column_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_075242_update_updated_at_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
