<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2017
 * Time: 14:36
 */

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
$this->beginPage();
$this->title = 'book shop'
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
    $session = Yii::$app->session;
    $cart_id = $session->get('cart.count');
    $menuItems = [
        [
            'label' => '<span class="glyphicon glyphicon-book Bookmark"></span><span class="badge badge-cart" id="badge_cart" >'. (int)$cart_id .'</span>',
            'options' => [
                'class' => 'show-cart'
            ]
        ],
    ];

    $menuBtn = [
        [
            'label' => 'О Нас',
            'options' => [
                'class' => 'btn btn-default'
            ]
        ],
    ];

    Modal::begin([
        'header' => '<h3>Корзина</h3>',
        'id' => 'cart',
        'size' => 'modal-lg',
        'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                         <button type="button" class="btn btn-success">Оформить заказ</button>
                         <button type="button" class="btn btn-danger clear-cart">Очистить корзину</button>'
    ]);
    Modal::end();

    if (Yii::$app->user->isGuest):
        $menuItems[] = ['label' => 'Регистрация','url' => ['/main/reg']];
        $menuItems[] = ['label' => 'Войти','url' => ['/main/login']];
    else:
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-menu-hamburger"></span>',
            'items' => [
                '<li class="dropdown-header">'.Yii::$app->user->identity['username'].'</li>',
                '<li class="divider"></li>',
                [
                    'label' => 'Книги',
                    'url' => ['/books/index'],
                    'linkOptions' => ['data-method' => 'post']
                ],
                [
                    'label' => 'Выход',
                    'url' => ['/main/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ]
            ]
        ];
    endif;
    echo Nav::widget([
        'items' => $menuBtn,
        'encodeLabels' => false,
        'options' => [
            'class' => ' navbar-left'
        ]
    ]);
    echo Nav::widget([
        'items' => $menuItems,
        'encodeLabels' => false,
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ]
    ]);

    ActiveForm::begin(
        [
            'action' => ['/main/search'],
            'method' => 'get',
            'options' => [
                'class' => 'navbar-form navbar-right'
            ]
        ]
    );
    echo '<div class="input-group input-group-sm">';
    echo Html::input(
        'type: text',
        'search',
        '',
        [
            'placeholder' => 'Поиск',
            'class' => 'form-control'
        ]
    );
    echo '<span class="input-group-btn">';
    echo Html::submitButton(
        '<span class="glyphicon glyphicon-search"></span>',
        [
            'class' => 'btn searchMark',
            'onClick' => 'window.location.href = this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_");'
        ]
    );
    echo '</span></div>';
    ActiveForm::end();
    NavBar::end();
    ?>
    <div class="container">
        <?= $content ?>
    </div>
</div>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage() ?>
