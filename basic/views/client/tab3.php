<?php

use yii\helpers\Html;
//use yii\helpers\Url;
use yii\grid\GridView;
use \yii\data\ArrayDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HorseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Yii::$app->formatter->locale = 'de-DE';

$dataProvider = new ArrayDataProvider([
    'allModels' => $model->horses,
    'sort' => [
        'attributes' => ['name'],
    ],
]);
?>

<div class="row">

<div class="col-xs-2">
    
    <div class="horses-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{errors} {items} {pager}',
        'columns' => [
            'name',
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'id' => $model['id'],
                'style' => "cursor: pointer",
                'onclick' => ''
                . '$(".gridview-invisible-service").hide();'
                . '$(".gridview-invisible-place").hide();'
                . '$("#horse_services_" + this.id).show();'
                . '$("#horse_places_" + this.id).show();'
                . ''
            ];
        },
    ]); ?>
    
    </div>
    
</div>

<div class="col-xs-9">
<?php

foreach ($model->horses as $key => $horse) {
    if (!empty($horse->services)) {
        $dataProvider = new ArrayDataProvider([
            'allModels' => $horse->services,
            'sort' => [
                'attributes' => ['active', 'service_name', 'performed_by',
                    'start_date', 'end_date', 'price',
                    'account_type', 'contract_number'],
            ],
        ]);
        echo '<div class="col-xs-12">';
        echo GridView::widget([
            'id' => 'horse_services_' . $horse->id,
            'layout' => '{errors} {items}',
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'active',
                    'format' => 'raw',
                    'value' => function ($model, $index) {
                        return Html::checkbox('active[]', $model->active, ['value' => $index, 'disabled' => true]);
                    },
                ],            
                'service_name',
                'performed_by',
                [
                    'attribute' => 'start_date',
                    'value' => function ($data) {
                        if ($data->start_date !== '0000-00-00') {
                            return date_format(date_create($data->start_date), 'd.m.Y');
                        } else {
                            return '';
                        }
                    },
                ],
                [
                    'attribute' => 'end_date',
                    'value' => function ($data) {
                        if ($data->end_date !== '0000-00-00') {
                            return date_format(date_create($data->end_date), 'd.m.Y');
                        } else {
                            return '';
                        }
                    },
                ],
                [
                    'attribute' => 'price',
                    'value' => function ($data) {
                        return Yii::$app->formatter->asCurrency($data->price, 'EUR');
                    },
                    'contentOptions' => ['style' => 'text-align: right;'],
                ],
                'account_type',
                'contract_number'
            ],
            'options' => [
                'class' => 'grid-view gridview-invisible-service'
            ],
        ]);
        echo '</div>';
    }
}

foreach ($model->horses as $key => $horse) {
    if (!empty($horse->places)) {
        $dataProvider = new ArrayDataProvider([
            'allModels' => $horse->places,
            'sort' => [
                'attributes' => ['box_name', 'box_number', 'price',
                    'account_type', 'contract_number'],
            ],
        ]);
        echo '<div class="col-xs-12">';
        echo GridView::widget([
            'id' => 'horse_places_' . $horse->id,
            'layout' => '{errors} {items}',
            'dataProvider' => $dataProvider,
            'columns' => [
                'box_name',
                'box_number',
                [
                    'attribute' => 'price',
                    'value' => function ($data) {
                        return Yii::$app->formatter->asCurrency($data->price, 'EUR');
                    },
                    'contentOptions' => ['style' => 'text-align: right;'],
                ],
                'account_type',
                'contract_number'
            ],
            'options' => [
                'class' => 'grid-view gridview-invisible-place'
            ],
        ]);
        echo '</div>';
    }
}
?>
</div>

</div>
