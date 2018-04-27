<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ErrorAction;
use app\forms\CreateLinkForm;
use yii\helpers\Url;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
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
        $model = new CreateLinkForm();

        if ($model->load(Yii::$app->request->post())) {
            $hash = $model->getShortLink();
                if ($model->create($hash)) {
                    return $this->redirect(Url::to(['statistic/index', 'hash' => $hash]), 302);
                }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
