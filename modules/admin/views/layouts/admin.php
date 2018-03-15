<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.2017
 * Time: 12:48
 */

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
$this->beginPage();
$this->title = 'Admin Panel'
?>
<html>
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
        'brandLabel' => Html::img('@web/Logo.gif', []),
        'brandUrl' => Yii::$app->homeUrl,
        'id' => 'navigation',
        'options' => [
            'class' => '',
        ],

    ]);

    $menuItems[] = [

        'label' => '<span class="glyphicon glyphicon-menu-hamburger"></span>',
        'items' => [
            '<li class="panel">Панель адміністратора</li>',
//            '<li class="panel">'.Yii::$app->user->identity['username'].'</li>',

            '<li class="divider"></li>',

            [
                'label' => 'Книги',
                'url' => ['/admin/books/index'],
                'linkOptions' => ['data-method' => 'post']
            ],
            [
                'label' => 'Замовлення',
                'url' => ['/admin/order/index'],
                'linkOptions' => ['data-method' => 'post']
            ],
            [
                'label' => 'Замовлені книги',
                'url' => ['/admin/order-books/index'],
                'linkOptions' => ['data-method' => 'post']
            ],
            [
                'label' => 'Вихід',
                'url' => ['/main/logout'],
                'linkOptions' => ['data-method' => 'post']
            ]
        ]
    ];

    echo Nav::widget([
        'items' => $menuItems,
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ]
    ]);


    NavBar::end();
    ?>
    <div class="container">
        <?= $content ?>
    </div>
</div>


<?php $this->endBody()?>
<div class="info">© Powered by Mazur Denys
    <br>
    2017
</div>
</body>
</html>
<?php $this->endPage() ?>
