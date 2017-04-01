<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horse */
/* @var $data array */

$this->params['breadcrumbs'][] = $this->title = Yii::t('app', '+ Horse add');
?>
<div class="horse-add">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render(
        '_form',
        [
            'model' => $model,
            'data'  => $data,
        ]
    ); ?>

</div>