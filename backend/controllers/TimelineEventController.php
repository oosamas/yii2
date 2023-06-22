<?php

namespace backend\controllers;

use backend\models\search\TimelineEventSearch;
use webvimark\components\AdminDefaultController;
use Yii;
use yii\web\Controller;

/**
 * Application timeline controller
 */
class TimelineEventController extends AdminDefaultController
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TimelineEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider, 
        ]);
    }
}
