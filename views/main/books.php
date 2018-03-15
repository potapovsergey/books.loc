<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25.04.2017
 * Time: 11:46
 */
use app\models\Year;
use app\models\Category;
use app\models\Author;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $model app\models\Books */
$year=Year::findOne($model->year_id);
$category=Category::findOne($model->category_id);
$author=Author::findOne($model->author_id);
?>
<div class="Description">
<div class="Content_books" data-id="<?= $model->id?>">
    <div class="col-xs-2">
        <div class="books_image">
            <?
            $image = $model->getImage($model->id);
            ?>
            <img src="<?= $image->getUrl('160x240'); ?>" alt="">
        </div>
        <div class="Price">
            <b id="bookstext2">Ціна:</b> <b id="bookstext3"><?= $model->price?> грн</b></div>
        <div class="Buy">

            <div class="col-xs-12"><div class="btnBuy">
                <a href="<? Url::to(['/cart/add', 'id' => $model->id]) ?>" class="btn Buy_btn cart_add" data-id="<?= $model->id ?>">Купити</a>
            </div></div>
        </div>
    </div>
    <div class="col-xs-10">
        <div class ="booksinfo">
            <b id="bookstext2">Назва:</b> <?= $model->name ?><br>
            <b id="bookstext2">Автор:</b> <?= $author->name?><br>
            <b id="bookstext2">Категорія:</b> <?= $category->category?><br>
            <b id="bookstext2">Рік видання:</b> <?= $year->year?><br>
            <b id="bookstext2">Стислий опис:</b> <?= $model->description ?><br>
        </div>
    </div>
</div>
</div>