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
use yii\helpers\Url;
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
            'label' => '<span class="glyphicon glyphicon-book Bookmark"></span>',
            'options' => [
                'class' => 'show-cart'
            ]
        ],
    ];

    $menuBtn = [
            [
            'label' => 'Про нас',
                'url' => ['/main/about'],
                ],
             [
            'label' => 'Контакти',
                 'url' => ['/main/contacts'],
            ],
    ];

    $menuBtn_A = [];

    if (Yii::$app->user->can('admin')):
        $menuBtn_A = [
            [
                'label' => 'Адмін Панель',
                'url' => ['/admin/books'],
            ]
        ];
    endif;

    Modal::begin([
        'header' => '<h3>Кошик</h3>',
        'id' => 'cart',
        'size' => 'modal-lg',
        'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                         <a href="'.Url::to(['/order/create', 'id' => false]).'" class="btn btn-success">Оформить заказ</a>
                         <button type="button" class="btn btn-danger clear-cart">Очистить корзину</button>'
    ]);
    Modal::end();

    if (Yii::$app->user->isGuest):
        $menuItems[] = ['label' => 'Реєстрація','url' => ['/main/reg']];
        $menuItems[] = ['label' => 'Вхід','url' => ['/main/login']];
    else:
        $menuItems[] = [
            'label' => '<span class="glyphicon glyphicon-menu-hamburger"></span>',
            'items' => [
                '<li class="dropdown-header">'.Yii::$app->user->identity['username'].'</li>',
                '<li class="divider"></li>',
                [
                    'label' => 'Профиль',
                    'url' => ['/profile/view', 'id' => Yii::$app->user->identity['id']],
                    'linkOptions' => ['data-method' => 'post']
                ],
                [
                    'label' => 'Вихід',
                    'url' => ['/main/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ]
            ]
        ];
    endif;
    echo Nav::widget([
        'items' => $menuBtn_A,
        'encodeLabels' => false,
        'options' => [
            'class' => ' navbar-nav navbar-left'
        ]
    ]);
    echo Nav::widget([
        'items' => $menuBtn,
        'encodeLabels' => false,
        'options' => [
            'class' => ' navbar-nav navbar-left'
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
            'placeholder' => 'Пошук',
            'class' => 'form-control'
        ]
    );
    echo '<span class="input-group-btn">';
    echo Html::submitButton(
        '<span class="glyphicon glyphicon-search"></span>',
        [
            'class' => 'btn searchMark',
            'onClick' => 'window.location.href = this.form.action + "?search=" + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, " ");'
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
