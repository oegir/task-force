<?php

use yii\db\Migration;

/**
 * Class m201209_070548_rename_password_column_to_user_table
 */
class m201209_070548_rename_password_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('user', 'password', 'password_hash');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('user', 'password_hash', 'password');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_070548_rename_password_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
