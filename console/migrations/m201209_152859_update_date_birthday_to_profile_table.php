<?php

use yii\db\Migration;

/**
 * Class m201209_152859_update_date_birthday_to_profile_table
 */
class m201209_152859_update_date_birthday_to_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE profile CHANGE `date_birthday` `date_birthday` INT";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201209_152859_update_date_birthday_to_profile_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_152859_update_date_birthday_to_profile_table cannot be reverted.\n";

        return false;
    }
    */
}
