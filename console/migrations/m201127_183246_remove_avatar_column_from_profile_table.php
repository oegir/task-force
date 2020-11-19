<?php

use yii\db\Migration;

/**
 * Class m201127_183246_remove_avatar_column_from_profile_table
 */
class m201127_183246_remove_avatar_column_from_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('profile', 'avatar');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201127_183246_remove_avatar_column_from_profile_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201127_183246_remove_avatar_column_from_profile_table cannot be reverted.\n";

        return false;
    }
    */
}
