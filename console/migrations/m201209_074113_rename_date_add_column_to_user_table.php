<?php

use yii\db\Migration;

/**
 * Class m201209_074113_rename_date_add_column_to_user_table
 */
class m201209_074113_rename_date_add_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('user', 'date_add', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('user', 'created_at', 'date_add');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_074113_rename_date_add_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
