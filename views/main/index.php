<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2017
 * Time: 14:38
 */

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider string */

?>
<div class="main-category">
    <div class="head-category">Навігація</div>
    <div class="body-category">
        <a href="" class="btn category_btn">1</a>
        <a href="" class="btn category_btn">2</a>
        <a href="" class="btn category_btn">3</a>
        <a href="" class="btn category_btn">4</a>
        <a href="" class="btn category_btn">5</a>
    </div>
</div>
<div class="mainContent">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model) {
            return $this->render('books_view',[
                'model' => $model
            ]);
        },
    ]) ?>
</div>