<?php

use yii\db\Migration;

/**
 * Class m201209_105227_update_avatar_column_to_user_table
 */
class m201209_105227_update_avatar_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('user', ['avatar' => "camera.png"], ['avatar' => null]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201209_105227_update_avatar_column_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201209_105227_update_avatar_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
