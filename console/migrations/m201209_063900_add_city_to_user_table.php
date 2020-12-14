<?php

use yii\db\Migration;

/**
 * Class m201209_063900_add_city_to_user_table
 */
class m201209_063900_add_city_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'city_id', $this->integer());

        $this->createIndex(
            'idx-user-city_id',
            'user',
            'city_id'
        );

        $this->addForeignKey(
            'fk-user-city_id',
            'user',
            'city_id',
            'city',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-user-city_id',
            'user'
        );

        $this->dropForeignKey(
            'fk-user-city_id',
            'user'
        );

        $this->dropColumn('user', 'city_id');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_063900_add_city_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
