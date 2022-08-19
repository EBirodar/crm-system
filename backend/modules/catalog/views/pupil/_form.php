<?php

use common\helpers\PupilHelper;
use common\models\Pupil;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Pupil $model
 * @var yii\widgets\ActiveForm $form
 */
$this->registerJs(
    '$("document").ready(function(){ 
		$("#new_country").on("pjax:end", function() {
			$.pjax.reload({container:"#countries"}); 
		});
    });'
);
?>

<div class="pupil-form">
    <?php yii\widgets\Pjax::begin(['id' => 'prl-form']) ?>
    <?php $form = ActiveForm::begin([
            'options' => ['data-pjax' => true ],
            'id' => 'Pupil',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-danger',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    #'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-8',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]
    );
    ?>

    <section>

        <div>
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'age')->textInput(['type' => 'number']) ?>

            <?= $form->field($model, 'gender')->dropDownList(PupilHelper::getGenderList(), [
                'prompt' => Yii::t('ui', 'Select')
            ]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textarea([
                'rows' => 4
            ]) ?>

            <?= $form->field($model, 'status')->dropDownList(PupilHelper::getStatusList()) ?>

        </div>

        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <div class="text-center">
            <?= Html::submitButton(
                'Create',
                [
                    'id' => 'save-button',
                    'class' => 'btn btn-success'
                ]
            );
            ?>
        </div>

        <?php ActiveForm::end(); ?>
        <?php yii\widgets\Pjax::end() ?>
    </section>

</div>



