<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Statistic;
use yii\helpers\Html;
$this->title = '';
?>
<div class="site-index">

    <div>
        <?= $link->create_at ?>
    </div>
    <div>
        <a href="<?= $link->link ?>"><?= $link->link ?></a>
    </div>
    <div>
        <a href="<?= $link->short_link ?>"><?= $link->short_link ?></a>
    </div>
    <div>
        <a href="<?= $link->short_link ?>+"><?= $link->short_link ?>+</a>
    </div>
    <div class="box-header with-border">
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
                        return Yii::$app->formatter->asDate($model->datetime, 'dd.MM.Y');
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
