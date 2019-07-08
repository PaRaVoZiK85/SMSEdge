<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m190708_094741_send_log_aggregated
 */
class m190708_094741_send_log_aggregated extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('send_log_aggregated', [
            'log_id' => Schema::TYPE_PK,
            'usr_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'cnt_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date' => Schema::TYPE_DATETIME,
            'success_count' => Schema::TYPE_INTEGER,
            'fail_count' => Schema::TYPE_INTEGER,
        ]);

        $this->execute('INSERT INTO send_log_aggregated (usr_id, cnt_id, `date`, fail_count, success_count)
                        (
                            SELECT u.usr_id, c.cnt_id, DATE(l.log_created) as `date`,
                            COUNT(IF(l.log_success=0,1, NULL)) as \'fail_count\',
                            COUNT(IF(l.log_success=1,1, NULL)) as \'success_count\'
                            FROM send_log l
                            INNER JOIN numbers n ON n.num_id = l.num_id
                            INNER JOIN users u ON u.usr_id = l.usr_id
                            INNER JOIN countries c ON c.cnt_id = n.cnt_id
                            GROUP BY l.usr_id, c.cnt_id, DATE(l.log_created)
                        )
                       ');

        $this->delete('send_log');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('send_log_aggregated');
    }

}
