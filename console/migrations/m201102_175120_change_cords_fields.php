<?php

use yii\db\Migration;

/**
 * Class m201102_175120_change_cords_fields
 */
class m201102_175120_change_cords_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE task CHANGE `latitude` `latitude` FLOAT NULL";
        $this->execute($sql);
        $sql = "ALTER TABLE task CHANGE `longitude` `longitude` FLOAT NULL";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201102_175120_change_cords_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201102_175120_change_cords_fields cannot be reverted.\n";

        return false;
    }
    */
}
