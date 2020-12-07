<?php

use yii\db\Migration;

/**
 * Class m201207_160134_update_phone_column_to_profile_table
 */
class m201207_160134_update_phone_column_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE profile CHANGE `phone` `phone` TEXT NULL";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201207_160134_update_phone_column_to_profile_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201207_160134_update_phone_column_to_profile_table cannot be reverted.\n";

        return false;
    }
    */
}
