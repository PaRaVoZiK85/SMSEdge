<?php

namespace app\controllers;

use app\models\SendLogAggregated;
use app\models\SendLogAggregateForm;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = null;
        $model = new SendLogAggregateForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $dataProvider = new ArrayDataProvider([
                'allModels' => (new SendLogAggregated())
                    ->find()
                    ->select(['success_count', 'fail_count', 'date'])
                    ->applyFilters($model)
                    ->asArray()
                    ->all(),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
        }
        return $this->render('index', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

}
