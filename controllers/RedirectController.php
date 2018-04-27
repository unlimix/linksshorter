<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class RedirectController extends Controller
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
