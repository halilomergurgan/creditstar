<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);
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
        'options' => [
            'class' => 'navbar-inverse'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-inverse navbar-nav navbar-left'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Klienditeenindus', 'url' => ['#']],
            ['label' => "<span class='glyphicon glyphicon-phone'></span> 1715",  'url' => ['#'],],
            ['label' => "<span class='glyphicon glyphicon-time'></span> E-P 9.00-21.00", 'url' => ['#']],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-inverse navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            '<li>'.Html::a("Tere, Kaupo Kasutaja", ['#']).'</li>',
            '<li>'.Html::a("<span class='glyphicon glyphicon-lock'></span> LOG OUT", ['/user/logout'], ['class'=>'button-orange','data-method' => 'post']).'</li>'
        ],
    ]);
    NavBar::end();
    ?>
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar secondNav',
        ],
        'brandLabel' => Html::img('@web/assets/cs_logo.png', ['alt'=>'','class'=>'headerLogo']),
        'brandUrl' => Yii::$app->homeUrl,

    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar navbar-nav navbar-left' ],
        'encodeLabels' => false,
        'items' => [
            ['label'=>'How it works<span class="glyphicon glyphicon-chevron-right orng-col"></span>','url'=>['https://www.creditstar.co.uk/site/howitworks/firstloan']],
            ['label'=>'Help centre<span class="glyphicon glyphicon-chevron-right orng-col"></span>','url'=>['https://www.creditstar.co.uk/site/help/faq']],
            ['label'=>'About us<span class="glyphicon glyphicon-chevron-right orng-col"></span>', 'url' => ['https://www.creditstar.co.uk/site/about']],
            ['label'=>'Responsible Lending<span class="glyphicon glyphicon-chevron-right orng-col"></span>', 'url' => ['https://www.creditstar.co.uk/site/responsible']],
        ],
    ]);
    echo Nav::widget([
        'options' => [
            'class'=>'navbar text-small text-right navbar-nav navbar-right'
        ],
        'encodeLabels' => false,
        'items' => [
            ['label'=>'По-русски','url'=>['#'],'class'=>'text-small'],
        ],

    ]);

    NavBar::end();
    ?>
    <div class="navPills">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-xs-11 col-sm-11 col-md-11">
                    <ul class="nav nav-pills">
                        <li role="presentation"><?php echo Html::a("My Actions", ['#']);?></li>
                        <li role="presentation"><?php echo Html::a("Users", ['/user/index']);?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container creditstarContainer">
        <div class="corner-ribbon top-left sticky red shadow"><span class="ribbonIcon glyphicon glyphicon-share-alt"></span></div>

        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
