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
<div class="bookss books-view" data-id="<?= $model->id?>">
    <div class="books-view" data-id="<?= $model->id ?>">
        <!--            <div class="books_image">-->
        <span id="description_name"><?= $model->name ?> </span><br>
        <?
        $image = $model->getImage($model->id);
        ?>
        <img src="<?= $image->getUrl('130x190'); ?>" alt=""><br>
        <b id="in_text"> Ціна:</b> <span id="description"><?= $model->price ?> грн</span><br>

    </div>
