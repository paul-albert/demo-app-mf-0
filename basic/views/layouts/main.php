<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = Yii::t('app', Yii::$app->params['appName']);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app', 'Demo App'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    NavBar::end();
    ?>
    
    <div class="container">
        
        <div class="container-left-menu">
            
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => [
                    'label' => Yii::t('app', 'Home'),
                    'url' => '/',
                ]
            ]) ?>

            <?php 
            NavBar::begin([
                'options' => [
                    'class' => 'navbar navbar-fixed-left',
                ],
            ]);
            echo Nav::widget([
                //'options' => ['class' => 'navbar-nav navbar-right'],
                'options' => ['class' => 'nav nav-pills nav-stacked'],
                'items' => [
                    /*
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    ),
                    */
                    ['label' => Yii::t('app', 'Clients'), 'url' => ['/client/index']],
                    ['label' => Yii::t('app', 'Suppliers'), 'url' => ['/suppliers/index']],
                    ['label' => Yii::t('app', 'Employees'), 'url' => ['/employees/index']],
                    ['label' => Yii::t('app', 'Plannings'), 'url' => ['/plannings/index']],
                    
                    ['label' => ''],
                    Html::label(Yii::t('app', 'Settings'), null, ['class' => 'navbar-stacked-label']),
                    ['label' => Yii::t('app', 'Services'), 'url' => ['/services/index']],
                    ['label' => Yii::t('app', 'Boxes'), 'url' => ['/boxes/index']],
                ],
            ]);
            NavBar::end();
            ?>
        </div>
        
        <div class="container-content">
        <?= $content ?>
        </div>
        
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::t('app', 'Demo App'); ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
