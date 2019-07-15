<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%batch_insert_users}}`.
 */
class m190715_180215_create_batch_insert_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%batch_insert_users}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%batch_insert_users}}');
    }
}
