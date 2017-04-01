<?php

use yii\helpers\Html;
//use yii\helpers\Url;
use yii\grid\GridView;
use \yii\data\ArrayDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HorseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$dataProvider = new ArrayDataProvider([
    'allModels' => $model->horses,
    'sort' => [
        'attributes' => ['name', 'online_number', 'birth_date', 'sex', 'color',
            'arrival_date', 'departure_date', 'active'],
    ],
]);
?>
<div class="horses-index">
    
    <div class="form-group col-xs-12 text-right">
        <?= Html::a(Yii::t('app', '+ Horse add'), ['horse/add'], ['class' => 'profile-link']) ?>
    </div>

    <div class="form-group col-xs-12">
        &nbsp;
    </div>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{errors} {items} {pager}',
        'columns' => [
            'name',
            'online_number',
            [
                'attribute' => 'birth_date',
                'value' => function ($data) {
                    if ($data->birth_date !== '0000-00-00') {
                        return date_format(date_create($data->birth_date), 'd.m.Y');
                    } else {
                        return '';
                    }
                },
            ],
            'sex',
            'color',
            [
                'attribute' => 'arrival_date',
                'value' => function ($data) {
                    if ($data->arrival_date !== '0000-00-00') {
                        return date_format(date_create($data->arrival_date), 'd.m.Y');
                    } else {
                        return '';
                    }
                },
            ],
            [
                'attribute' => 'departure_date',
                'value' => function ($data) {
                    if ($data->departure_date !== '0000-00-00') {
                        return date_format(date_create($data->departure_date), 'd.m.Y');
                    } else {
                        return '';
                    }
                },
            ],
            [
                'attribute' => 'active',
                'format' => 'raw',
                'value' => function ($model, $index) {
                    return Html::checkbox('active[]', $model->active, ['value' => $index, 'disabled' => true]);
                },
            ],            
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'id' => $model['id'],
                'style' => "cursor: pointer",
                'onclick' => ''
                . '$(".gridview-invisible-history").hide();'
                . '$("#horse_histories_" + this.id).show();'
                . ''
            ];
        },
    ]); ?>
</div>

<?php
foreach ($model->horses as $key => $horse) {
    if (!empty($horse->histories)) {
        $dataProvider = new ArrayDataProvider([
            'allModels' => $horse->histories,
            'sort' => [
                'attributes' => ['medicament', 'date', 'note'],
            ],
        ]);
        echo '<div class="row">';
        echo '<div class="col-xs-6">';
        echo GridView::widget([
            'id' => 'horse_histories_' . $horse->id,
            'layout' => '{errors} {items}',
            'dataProvider' => $dataProvider,
            'columns' => [
                'medicament',
                [
                    'attribute' => 'date',
                    'value' => function ($data) {
                        if ($data->date !== '0000-00-00') {
                            return date_format(date_create($data->date), 'd.m.Y');
                        } else {
                            return '';
                        }
                    },
                ],
                'note',
            ],
            'options' => [
                'class' => 'grid-view gridview-invisible-history'
            ],
        ]);
        echo '</div>';
        echo '</div>';
    }
}
