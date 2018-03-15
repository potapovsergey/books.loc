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
/* @var $model app\models\Books */
$year=Year::findOne($model->year_id);
$category=Category::findOne($model->category_id);
$author=Author::findOne($model->author_id);
?>
<div class="block_books" data-id="<?= $model->id?>">
        <div class ="booksinfo">
            <div id="li">
                <div class="booksinfo">
                    <b id="bookstext">Назва:</b> <?= $model->name ?><br>
                    <b id="bookstext">Автор:</b> <?= $author->name?><br>
                </div>
            </div>
        </div>
</div>