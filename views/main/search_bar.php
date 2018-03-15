<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use app\models\Category;
use yii\widgets\Pjax;
use app\models\Author;
use app\models\Year;


/* @var $this yii\web\View */
/* @var $model app\models\BooksSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $id_category integer */

?>
<div class="goods-search books_search_bar">

    <?php Pjax::begin(); ?><?php $form = ActiveForm::begin([
        'id' => 'login-form-inline',
        'action' => ['category', 'id' => $id_category, 'BooksSearch[category_id]' => $id_category],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'year_id')->dropDownList(ArrayHelper::map(Year::find()->all(), 'id', 'year'),[
        'prompt' => 'Виберіть рік',
        //'class' => 'btn-info'
    ]) ?>
    <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Author::find()->all(), 'id', 'name'),[
        'prompt' => 'Виберіть автора',
        //'class' => 'btn-info'
    ]) ?>
    <?php echo   $form->field($model, 'min_price')?>
    <?php echo   $form->field($model, 'max_price')?>

    <div class="form-group">
        <?= Html::submitButton('Сортувати', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?> <?php Pjax::end(); ?>

</div>

