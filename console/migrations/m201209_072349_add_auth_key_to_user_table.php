<?php

use yii\db\Migration;

/**
 * Class m201209_072349_add_auth_key_to_user_table
 */
class m201209_072349_add_auth_key_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'auth_key', $this->char(32));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'auth_key');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_072349_add_auth_key_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
