<?php

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Client data');

use yii\bootstrap\Tabs;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = $this->title = Yii::t('app', 'Clients');

//echo '<pre>' . print_r($model, true) . '</pre>';
//echo '<pre>' . print_r($model->horses, true) . '</pre>';

$form = ActiveForm::begin(['id' => 'client-form', 'options' => ['class' => 'form-inline']]);

?>
<input type="hidden" name="Client[id]" id="client-id" value="<?= $model->id; ?>">
<div class="row">
    <div class="form-group col-xs-4">
    <?= $form->field($model, 'first_name')->textInput(['value' => $model->first_name]); ?>
    </div>
    <div class="form-group col-xs-4">
    <?= $form->field($model, 'last_name')->textInput(['value' => $model->last_name]); ?>
    </div>
</div>
<?php
echo Tabs::widget([
    'items' => [
        [
            'label' => Yii::t('app', 'Information'),
            'content' => $this->render('tab1', ['model' => $model, 'form' => $form]),
            'active' => true,
            'options' => ['id' => 'client-tab-1', 'class' => 'my-own-tab'],
        ],
        [
            'label' => Yii::t('app', 'Horses'),
            'content' => $this->render('tab2', ['model' => $model, 'form' => $form]),
            'headerOptions' => [],
            'options' => ['id' => 'client-tab-2', 'class' => 'my-own-tab'],
        ],
        [
            'label' => Yii::t('app', 'Services'),
            'content' => $this->render('tab3', ['model' => $model, 'form' => $form]),
            'headerOptions' => [],
            'options' => ['id' => 'client-tab-3', 'class' => 'my-own-tab'],
        ],
    ],
]);

ActiveForm::end();
?>

<script type="text/javascript">
$(function () {
    $("input, textarea").blur(function () {
        $.post("/client/modify/" + <?= $model->id; ?>, $("#client-form").serialize());
    });
});
</script>
