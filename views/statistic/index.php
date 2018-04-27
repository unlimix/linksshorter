<?php

/**
 * @var Links $link
 * @var Statistic $model
 * @var ActiveDataProvider $dataProvider
 * @var View $this
 */

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Links;
use app\models\Statistic;
use yii\web\View;

$this->title = '';
?>
<div class="site-index">

    <div class="box-header with-border">
        <div>
            <?php $datetime = new \DateTime($link->create_at); ?>
            CREATED <?= $datetime->format('d.m.Y, H:i:s') ?>
        </div>
        <div>
            <a target="_blank" href="<?= $link->link ?>"><?= $link->link ?></a>
        </div>
        <div>
            <a target="_blank" href="http://<?= $_SERVER['HTTP_HOST']; ?>/<?= $link->short_link ?>">
                http://<?= $_SERVER['HTTP_HOST']; ?>/<?= $link->short_link ?>
            </a>
        </div>
        <div>
            <a target="_blank" href="http://<?= $_SERVER['HTTP_HOST']; ?>/<?= $link->short_link ?>+">
                http://<?= $_SERVER['HTTP_HOST']; ?>/<?= $link->short_link ?>+
            </a>
        </div>
    </div>
    <div class="box-body table-responsive">
        <?= GridView::widget([
            'layout' => "{items}\n{summary}{pager}",
            'summaryOptions' => [
                'class' => 'dataTables_info',
                'role' => 'status',
                'aria-live' => 'polite',
            ],
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'datetime',
                    'content' => function (Statistic $model) {
                        $datetime = new \DateTime();
                        return $datetime->format('d.m.Y, H:i:s');
                    }
                ],
                'ip',
                'region',
                'browser',
                'os',
            ],
        ]); ?>
    </div>
</div>
