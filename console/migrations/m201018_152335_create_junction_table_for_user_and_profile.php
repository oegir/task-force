<?php

use yii\db\Migration;

/**
 * Class m201018_152335_create_junction_table_for_user_and_profile
 */
class m201018_152335_create_junction_table_for_user_and_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'profile_id' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_profile-user_id',
            'user_profile',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_profile-user_id',
            'user_profile',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_profile-profile_id',
            'user_profile',
            'profile_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_profile-profile_id',
            'user_profile',
            'profile_id',
            'profile',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_profile-user_id',
            'user_profile'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_profile-user_id',
            'user_profile'
        );

        // drops foreign key for table `profile`
        $this->dropForeignKey(
            'fk-user_profile-profile_id',
            'user_profile'
        );

        // drops index for column `profile_id`
        $this->dropIndex(
            'idx-user_profile-profile_id',
            'user_profile'
        );

        echo "m201018_152335_create_junction_table_for_user_and_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201018_152335_create_junction_table_for_user_and_profile cannot be reverted.\n";

        return false;
    }
    */
}
