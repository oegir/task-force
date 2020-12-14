<?php

use yii\db\Migration;

/**
 * Class m201209_064153_remove_city_from_profile_table
 */
class m201209_064153_remove_city_from_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey(
            'profile_ibfk_1',
            'profile'
        );
        $this->dropColumn('profile', 'city_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201209_064153_remove_city_from_profile_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_064153_remove_city_from_profile_table cannot be reverted.\n";

        return false;
    }
    */
}
