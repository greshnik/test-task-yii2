<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\sortable\Sortable;

/* @var $this yii\web\View */
/* @var $model app\models\Tour */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$script = '
      $(function() {
        $( ".container-items" ).sortable();
        $( ".container-items" ).disableSelection();

        $( "form" ).submit(function() {
            var positions = [];
            $(".item, .base-item").each(function(index, value){
                if($(value).attr("data-name")) {
                    positions.push($(value).attr("data-name"));
                }
                else {
                    positions.push(0);
                }
            });
            $("#positionFields").val(JSON.stringify(positions));
        });
      });
    ';
$this->registerJs($script);
?>

<div class="tour-form">
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <?= $form->errorSummary($model); ?>
    <?php echo $form->field($model, 'positionFields')->hiddenInput(['id' => 'positionFields'])->label(false); ?>
    <div class="dynamicform_wrapper">
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.item',
        'limit' => 20,
        'min' => 1,
        'insertButton' => '.add-item',
        'deleteButton' => '.remove-item',
        'model' => $modelsOptionValue[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
            'value'
        ],
    ]); ?>
        <div class="container-items">

            <div class="base-item" data-name="name">
                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="base-item" data-name="description">
                <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
            <div class="base-item" data-name="countAdults">
                <?php echo $form->field($model, 'countAdults')->textInput() ?>
            </div>
            <div class="base-item" data-name="countChildren">
                <?php echo $form->field($model, 'countChildren')->textInput() ?>
            </div>
            <div class="base-item" data-name="countSuckling">
                <?php echo $form->field($model, 'countSuckling')->textInput() ?>
            </div>
        <?php foreach ($modelsOptionValue as $index => $modelOptionVal): ?>
            <div class="item">
                <button type="button" class="remove-item btn btn-danger btn-xs right"><span class="glyphicon glyphicon-minus"></span> Delete field</button>
                <?php echo $form->field($modelOptionVal, "[{$index}]name")->textInput() ?>
                <?php echo $form->field($modelOptionVal, "[{$index}]value")->textInput() ?>
            </div>
        <?php endforeach; ?>
        </div>
        <button type="button" class="add-item btn btn-success btn-sm right"><span class="fa fa-plus"></span> New field</button>
    <?php DynamicFormWidget::end(); ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
