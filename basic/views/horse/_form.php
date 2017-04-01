<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Horse */
/* @var $form yii\widgets\ActiveForm */
/* @var $data array */
?>

<div class="horse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->dropDownList($data['clients']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'online_number')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'birth_date')->textInput()->widget(
        DatePicker::classname(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options'    => ['class' => 'form-control'],
        ]
    ); ?>

    <?= $form->field($model, 'sex')->dropDownList($data['sexs']); ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]); ?>

    <?= $form->field($model, 'arrival_date')->textInput()->widget(
        DatePicker::classname(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options'    => ['class' => 'form-control'],
        ]
    ); ?>

    <?= $form->field($model, 'departure_date')->textInput()->widget(
        DatePicker::classname(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options'    => ['class' => 'form-control'],
        ]
    ); ?>
    
    <?= $form->field($model, 'active')->checkbox([
        //'label' => 'Неактивный чекбокс',
        //'labelOptions' => [
        //    'style' => 'padding-left:20px;'
        //],
        //'disabled' => true
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
