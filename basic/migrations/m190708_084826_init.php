<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m190708_084826_init
 */
class m190708_084826_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('users', [
           'usr_id' => Schema::TYPE_PK,
           'usr_name' => Schema::TYPE_STRING . ' NOT NULL',
           'usr_active' => Schema::TYPE_BOOLEAN,
           'usr_created' => Schema::TYPE_DATETIME,
       ]);

        $this->createTable('countries', [
            'cnt_id' => Schema::TYPE_PK,
            'cnt_code' => Schema::TYPE_STRING . ' NOT NULL',
            'cnt_title' => Schema::TYPE_STRING . ' NOT NULL',
            'cnt_created' => Schema::TYPE_DATETIME,
        ]);

        $this->createTable('numbers', [
            'num_id' => Schema::TYPE_PK,
            'cnt_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'num_number' => Schema::TYPE_STRING,
            'num_created' => Schema::TYPE_DATETIME,
        ]);

        $this->createTable('send_log', [
            'log_id' => Schema::TYPE_PK,
            'usr_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'num_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'log_message' => Schema::TYPE_TEXT,
            'log_success' => Schema::TYPE_BOOLEAN,
            'log_created' => Schema::TYPE_DATETIME,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('countries');
        $this->dropTable('numbers');
        $this->dropTable('send_log');
    }


}
