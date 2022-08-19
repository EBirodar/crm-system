<?php

use common\helpers\ClientHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Client $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="client-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Client',
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


            <!-- attribute name -->
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <!-- attribute gender -->
            <?= $form->field($model, 'gender')->dropDownList(ClientHelper::getGenderList(), [
                'prompt' => Yii::t('ui', 'Select')
            ]) ?>

            <!-- attribute visited_date -->
            <?= $form->field($model, 'visited_date')->textInput(['type' => 'date']) ?>

            <!-- attribute commit -->
            <?= $form->field($model, 'comment')->textarea([
                'rows' => 4
            ]) ?>

            <?= $form->field($model, 'status')->dropDownList(ClientHelper::getStatusList()) ?>
        </div>


        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <div class="text-center">
            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? 'Create' : 'Save'),
                [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
            );
            ?>
        </div>

        <?php ActiveForm::end(); ?>

    </section>

</div>







