<?php

use yii\db\Migration;

/**
 * Class m201227_171233_update_user_role_column
 */
class m201227_171233_update_user_role_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "UPDATE `user` SET `role` = 'worker' where `id` >= '1' AND `id` <= '3' ";
        $sql . "UPDATE `user` SET `role` = 'owner' where `id` = '4'";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201227_171233_update_user_role_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201227_171233_update_user_role_column cannot be reverted.\n";

        return false;
    }
    */
}
