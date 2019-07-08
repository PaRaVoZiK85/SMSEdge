<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SendLogAggregated]].
 *
 * @see SendLogAggregated
 */
class SendLogAggregatedQuery extends \yii\db\ActiveQuery
{
    /**
     * @param int $userId
     * @return $this
     */
    public function filterByUser($userId = null)
    {
        return $this->andWhere(['usr_id' => $userId]);
    }

    /**
     * @param int|null $countryId
     * @return $this
     */
    public function filterByCountry($countryId = null)
    {
        return $this->andWhere(['cnt_id' => $countryId]);
    }

    /**
     * @param string $dateFrom
     * @return $this
     */
    public function filterByDateFrom($dateFrom)
    {
        return $this->andWhere(['>=', 'date', $dateFrom]);
    }

    /**
     * @param string $dateTo
     * @return $this
     */
    public function filterByDateTo($dateTo)
    {
        return $this->andWhere(['<=', 'date', $dateTo]);
    }

    /**
     * @param SendLogAggregateForm $model
     * @return $this
     */
    public function applyFilters($model){
        if ($model->cntId){
            $this->filterByCountry($model->cntId);
        }
        if ($model->usrId){
            $this->filterByUser($model->usrId);
        }
        if ($model->dateFrom){
            $this->filterByDateFrom($model->dateFrom);
        }
        if ($model->dateTo){
            $this->filterByDateTo($model->dateTo);
        }

        return $this;
    }
}
