<?php

namespace app\controllers;

use yii\web\Controller;

class StatisticController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex($hash)
    {
        $model = '';
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
