<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SendLogAggregateForm extends Model
{
    public $dateFrom;
    public $dateTo;
    public $cntId;
    public $usrId;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['dateFrom', 'dateTo'], 'required'],
            [['dateFrom', 'dateTo'], 'date', 'format' => 'php:Y-m-d'],
            [['cntId', 'usrId'], 'integer'],
        ];
    }

}
