<?php

use yii\db\Migration;

/**
 * Class m201209_075440_rename_user_column_to_user_table
 */
class m201209_075440_rename_user_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('user', 'name', 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('user', 'username', 'name');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_075440_rename_user_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
