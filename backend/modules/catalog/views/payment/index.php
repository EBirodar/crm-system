<?php

use common\helpers\PaymentHelper;
use common\models\Payment;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\PaymentSearch $searchModel
 */

$this->title = Yii::t('models', 'Payments');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">' . $actionColumnTemplateString . '</div>';
?>
<div class="payment-index">


    <?php Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('ui', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <hr/>

    <div>
        <?php
        $gridColumns = [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width: 5%', 'class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'name',
                'vAlign' => 'middle',
                'hAlign' => 'left',
            ],

            [
                'attribute' => 'amount',
                'width' => '12%',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'pageSummary' => true,
                'value' => function (Payment $model) {
                    return ($model->type === Payment::TYPE_INCOME) ? $model->amount : -1 * $model->amount;
                },
                'format' => ['decimal'],
            ],
            [
                'width' => '12%',
                'attribute' => 'date',
                'vAlign' => 'middle',
                'hAlign' => 'center',
            ],
            [
                'width' => '10%',
                'attribute' => 'type',
                'vAlign' => 'middle',
                'hAlign' => 'center',
                'value' => function (Payment $model) {
                    return PaymentHelper::getTypeLabel($model->type);
                },

                'filter' => PaymentHelper::getTypeList(),
                'format' => 'raw'

            ],
            [
                'attribute' => 'status',
                'width' => '10%',
                'hAlign' => 'center',
                'value' => function (Payment $model) {
                    return PaymentHelper::getStatusLabel($model->status);
                },
                'filter' => PaymentHelper::getStatusList(),
                'format' => 'raw'
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'width' => '14%',
                'template' => $actionColumnTemplateString,
                'buttons' => [
                    'view' => function ($url, $model) {
                        $options = [
                            'title' => Yii::t('ui', "Подробная информация"),
                            'aria-label' => Yii::t('ui', "Подробная информация"),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('ui', 'Редактировать'),
                            'aria-label' => Yii::t('ui', 'Редактировать'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $key], $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('ui', 'Удалить'),
                            'aria-label' => Yii::t('ui', 'Удалить'),
                            'data-confirm' => Yii::t('ui', 'Вы уверены, что хотите удалить этот элемент?'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $key], $options);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Url::to(['view', 'id' => $key]);
                        return $url;
                    }
                },
            ],
        ];

        echo GridView::widget([
            'id' => 'kv-grid-confirmed_list',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns, // check the configuration for grid columns by clicking button above
            'containerOptions' => ['style' => 'overflow: hidden'], // only set when $responsive = false
            'headerRowOptions' => ['class' => 'kartik-sheet-style'],
            'filterRowOptions' => ['class' => 'kartik-sheet-style'],
            'pjax' => true,
            'showPageSummary' => true,
            'pageSummaryRowOptions' => ['class' => 'kv-page-summary info'],
            'pageSummaryPosition' => GridView::POS_TOP,
            'toolbar' => [
                [
                    'content' =>
                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                            'class' => 'btn btn-default',
                            'title' => Yii::t('grid', 'Reset Grid'),
                            'data-pjax' => 0,
                        ]),
                    'options' => ['class' => 'btn-group mr-2']
                ],
            ],
            'export' => [
                'fontAwesome' => true
            ],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
            ],
            'persistResize' => false,
            'toggleDataOptions' => ['minCount' => 10],
        ]);
        ?>
    </div>

</div>


<?php Pjax::end() ?>


