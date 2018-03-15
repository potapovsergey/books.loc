<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2017
 * Time: 14:38
 */

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $dataProvider string */
/* @var $model \app\models\Books */

?>
<div class="main-category">
    <div class="head-category">Категорії</div>
    <div class="body-category">
        <?php echo Html::a('Фантастика', ['/main/category','id'=>1, 'BooksSearch[category_id]' => 1],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Учбові', ['/main/category','id'=>2, 'BooksSearch[category_id]' => 2],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Детективи', ['/main/category','id'=>3, 'BooksSearch[category_id]' => 3],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Романи', ['/main/category','id'=>4, 'BooksSearch[category_id]' => 4],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Документальні', ['/main/category','id'=>5, 'BooksSearch[category_id]' => 5],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Фентезі', ['/main/category','id'=>6, 'BooksSearch[category_id]' => 6],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Утопії', ['/main/category','id'=>7, 'BooksSearch[category_id]' => 7],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Драми', ['/main/category','id'=>8, 'BooksSearch[category_id]' => 8],['class'=>'btn category_btn']) ?>
        <?php echo Html::a('Пригоди', ['/main/category','id'=>9, 'BooksSearch[category_id]' => 9],['class'=>'btn category_btn']) ?>
    </div>
</div>
<div class="carosel" id="carosel1"><div class="new">Новинки</div><hr>
    <a class="carosel-control carosel-control-left glyphicon glyphicon-chevron-left" href="#"></a>
    <div class="carosel-inner">
        <?php foreach ($model as $mod): ?>
        <div class="carosel-item books-view" data-id="<?= $mod->id ?>">
<!--            <div class="books_image">-->
            <span id="description_name"><?= $mod->name ?> </span><br>
                <?
                $image = $mod->getImage($mod->id);
                ?>
                <img src="<?= $image->getUrl('130x190'); ?>" alt=""><br>
            <b id="in_text"> Ціна:</b> <span id="description"><?= $mod->price ?> грн</span><br>

        </div>

        <?php endforeach; ?>
    </div>
    <a class="carosel-control carosel-control-right glyphicon glyphicon-chevron-right" href="#"></a>
</div>
<div class="About_main"><h1 id="aboutT""><b>Про нас</b></h1>
    <p id="about_main""> Книжковий інтернет магазин BookShop працює для вас з 2008 року, за цей час ми обслужили десятки тисяч покупців, продали сотні тисяч товарів. Купуючи книги у нас ви гарантованої отримуєте якісне обслуговування, хорошу упаковку відправок по Україні, доброзичливим операторів і кур'єрів. В даний час на книжковому ринку України з'явилися десятки нових магазинів, які відрізняються не найвищою якістю обслуговування і відсотком виконання замовлень. Робіть покупки тільки в магазинах, які вже заслужили багатьма роками своєї роботи довіру покупців і до них повертаються з нова і знову за покупками.
    Книги насамперед? Книжковий інтернет магазин - покупка книг
    Головний напрямок діяльності нашого інтернет-магазину - книги. BookShop намагається надавати своїм клієнтам широкий асортимент і низькі ціни на книжкову продукцію.</div>

