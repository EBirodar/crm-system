<?php
declare(strict_types=1);

use common\models\Pupil;
use dmstr\helpers\Metadata;
use rmrevin\yii\fontawesome\FA;
use yii\data\ArrayDataProvider;
use yii\widgets\ListView;

/*
 * @var yii\web\View $this
 */
$controllers = Metadata::getModuleControllers($this->context->module->id);
$favourites = [];

$patterns = [
    '^default$' => ['color' => 'gray', 'icon' => FA::_CUBE],
    '^.*$' => ['color' => 'green', 'icon' => FA::_CUBE],
];

foreach ($patterns as $pattern => $options) {
    foreach ($controllers as $c => $item) {
        $controllers[$c]['label'] = $item['name'];
        if (preg_match("/$pattern/", $item['name']) && $item['name'] !== 'default') {
            $favourites[$c] = $item;
            $favourites[$c]['head'] = ucfirst(substr($item['name'], 0, 2));
            // ActiveRecord (model) counter
            #$model = \Yii::createObject('app\\modules\\sakila\\models\\'.Inflector::id2camel($item['name']));
            #$favourites[$c]['head']  .= ' <small class="label label-info pull-right">'.count($model->find()->all()).'</small>';
            $favourites[$c]['label'] = $item['name'];
            $favourites[$c]['color'] = $options['color'];
            $favourites[$c]['icon'] = $options['icon'] ?? null;
            unset($controllers[$c]);
        }
    }
}
$dataProvider = new ArrayDataProvider(
    [
        'allModels' => $favourites,
        'pagination' => [
            'pageSize' => 100
        ]
    ]
);

$listView = ListView::widget(
        [
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{pager}",
            'itemView' => function ($data) {
                return '<div class="col-xs-6 col-sm-4 col-lg-3">' . insolita\wgadminlte\LteSmallBox::widget(
                        [
                            'type' => $data['color'],
                            'title' => Pupil::getCount(),
                            'text' => $data['label'],
                            'icon' => 'fa fa-' . $data['icon'],
                            'footer' => 'Manage',
                            'link' => $data['url'],
                        ]
                    );
            },
        ]
    ) . '</div>';
?>

<div class="row">
    <?= $listView ?>
</div>

