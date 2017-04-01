<?php

use yii\helpers\Html;
//use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title = Yii::t('app', 'Clients');
?>
<div class="client-index">

    <!--<h1><?= Html::encode($this->title); ?></h1>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'layout' => '{errors} {items} {pager}',
        'columns' => [
            'first_name',
            'last_name',
            'city',
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'id' => $model['id'],
                'style' => "cursor: pointer",
                'onclick' => 'window.location.href = "/client/view/" + this.id;'
            ];
        },
    ]); ?>
</div>
