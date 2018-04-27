<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Links;
use app\models\Statistic;
use yii\web\NotFoundHttpException;

class RedirectController extends Controller
{

    /**
     * @param $hash string
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionIndex($hash)
    {
        $link = Links::findOne(['short_link' => $hash]);
        if (empty($link)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        Yii::$app->browser->Browser($_SERVER['HTTP_USER_AGENT']);
        Yii::$app->IpGeoBase->getGeoPosition($_SERVER['REMOTE_ADDR']);

        $datetime = new \DateTime();
        $statistic = new Statistic([
            'link_id' => $link->id,
            'datetime' => $datetime->format('Y-m-d H:i:s'),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'region' => Yii::$app->IpGeoBase->getGeoPosition($_SERVER['REMOTE_ADDR']),
            'browser' => Yii::$app->browser->getBrowser() . ' ' . Yii::$app->browser->getVersion(),
            'os' => Yii::$app->browser->getPlatform(),
        ]);
        $statistic->save();

        return $this->redirect($link->link);
    }
}
