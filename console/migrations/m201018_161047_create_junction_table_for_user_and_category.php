<?php

use yii\db\Migration;

/**
 * Class m201018_161047_create_junction_table_for_user_and_category
 */
class m201018_161047_create_junction_table_for_user_and_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_category', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_category-user_id',
            'user_category',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_category-user_id',
            'user_category',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-user_category-category_id',
            'user_category',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-user_category-task_id',
            'user_category',
            'category_id',
            'category',
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
            'fk-user_category-user_id',
            'user_category'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_category-user_id',
            'user_category'
        );

        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-user_category-task_id',
            'user_category'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-user_category-category_id',
            'user_category'
        );

        echo "m201018_161047_create_junction_table_for_user_and_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201018_161047_create_junction_table_for_user_and_category cannot be reverted.\n";

        return false;
    }
    */
}
