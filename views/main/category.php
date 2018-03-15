<?php


use yii\widgets\ListView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider string */
/* @var $searchModel string */
/* @var $id_category integer */

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
<div class="sort"> <?php echo $this->render('search_bar', ['model' => $searchModel, 'id_category' => $id_category]); ?></div>
<div class="mainContent">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
//            'pager'=>[
//                'options'=> [
//                    'class'=>'pagination paginat'
//                ]
//            ],
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model) {
                return $this->render('books_view',[
                    'model' => $model
                ]);
            },
        ]) ?>
</div>

