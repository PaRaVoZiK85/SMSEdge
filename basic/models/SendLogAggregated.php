<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "send_log_aggregated".
 *
 * @property int $log_id
 * @property int $usr_id
 * @property int $cnt_id
 * @property string $date
 * @property int $success_count
 * @property int $fail_count
 */
class SendLogAggregated extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'send_log_aggregated';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usr_id', 'cnt_id'], 'required'],
            [['usr_id', 'cnt_id', 'success_count', 'fail_count'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'usr_id' => 'Usr ID',
            'cnt_id' => 'Cnt ID',
            'date' => 'Date',
            'success_count' => 'Success Count',
            'fail_count' => 'Fail Count',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SendLogAggregatedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SendLogAggregatedQuery(get_called_class());
    }
}
