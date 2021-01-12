<?php

use yii\db\Migration;

/**
 * Class m210106_080702_update_rate_column_to_opinion_table
 */
class m210106_080702_update_rate_column_to_opinion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "ALTER TABLE opinion CHANGE `rate` `rate` INT NULL";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210106_080702_update_rate_column_to_opinion_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210106_080702_update_rate_column_to_opinion_table cannot be reverted.\n";

        return false;
    }
    */
}
