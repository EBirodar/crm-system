<?php
use common\helpers\PupilHelper;
use common\models\Pupil;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/**
**
* @var yii\data\ActiveDataProvider $dataProvider
**/

if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
}
$actionColumnTemplateString = '<div class="action-buttons">'."{view} {update} {delete}".'</div>';
?>

<div class="giiant-crud teacher-index">
    <div class="clearfix crud-navigation">
        <button type="submit" id="showModalButton" class="btn btn-success">create</button>
<!--        --><?//= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New',['create'], ['class' => 'btn btn-success ','id'=>'showModalButton']) ?>
    </div>

    <div>
        <?php Pjax::begin(['id' => 'prl-ajax']) ?>

            <div class="containe">
                <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ism</th>
                        <th>tel raqami</th>
                        <th>adres</th>
                        <th>holati</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $m = 1; foreach ($model as $m): ?>
                    <tr>
                        <td><?=$m->full_name?></td>
                        <td><?=$m->phone?></td>
                        <td><?=$m->address?></td>
                        <td><?= $m->getStatusLabel(); ?></td>
                        <td> <?= Html::a('uchirish',

                                ['delete', 'id' => $m->id], [
                                    'enableClientValidation' => true,
                                    'enableAjaxValidation'   => false,
                                'class' => 'btn',
                                'id'=>'delete',
                                'style'=>'color: #fff; background: red',
                            ]),

                            Html::a('update', ['update', 'id' => $m->id], [
                                'class' => 'btn',
                                'style'=>'color: #000; background: yellow',
                            ]),

                            Html::a('view', ['view', 'id' => $m->id], [
                                'class' => 'btn btn-success',
                            ]);
                            ?></td>
                    </tr>
                    <?php $m++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php Pjax::end() ?>

    </div>

</div>

<?php
$js = <<<JS
       $(document).on('click', '#showModalButton', function(event){
           event.preventDefault();
           var url = $(this).attr('href');
           $('#modal').modal('show');
           send(url);
    });
     function send(_url, formatData = null){
         $.ajax({
         url: "/admin/catalog/pupil/create",
         type: "POST",
         dataType: "json",
         data: formatData,
         success:function (data){
             if (data.status == false){
                  $('#modal').modal('show').find('#modalContent').html(data.content);
                  $('#save-button').on('click', function (event){
                      event.preventDefault();
                      var form =$('#prl-form').serialize();
                      send(_url, form);
                      return false
                  });
                  return false;
             }
             else {
                 $.pjax.reload({container:"#prl-ajax"});
                 $('#modal').modal('hide');
             }
           }
         });
     } 
 JS;
$this->registerJs($js);
?>

<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);

echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();
?>

