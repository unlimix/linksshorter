<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\Links;
use app\models\Statistic;

class StatisticController extends Controller
{
    /**
     * @param $hash string
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($hash)
    {

        $link = Links::findOne(['short_link' => $hash]);
        if (empty($link)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Statistic::find()->where(['link_id' => $link->id]),
            'sort' => [
                'defaultOrder' => ['datetime' => SORT_DESC],
            ],
        ]);

        return $this->render('index', [
            'link' => $link,
            'dataProvider' => $dataProvider,
        ]);
    }
}
