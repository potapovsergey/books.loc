<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Author;
use app\models\Year;
use app\models\Category;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\models\Books */
    $author=new Author();
/* @var $form yii\widgets\ActiveForm */

?>

<div class="books-form">
    <?php Modal::begin([
        'header' => '<h2>Додати автора</h2>',
        'toggleButton' => [
            'tag' => 'button',
            'class' => 'btn Author_btn',
            'label' => 'Додати автора',
        ]
    ]);

    echo $this->render('author',['author'=>$author]);

    Modal::end();
    ?>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php Pjax::begin()?><?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Author::find()->all(), 'id', 'name'),[
        'prompt' => 'Виберіть автора',
        'label'=>''
    ]) ?><?php Pjax::end()?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>



    <?= $form->field($model, 'year_id')->dropDownList(ArrayHelper::map(Year::find()->all(), 'id', 'year'),[
        'prompt' => 'Виберіть рік'
    ]) ?>
    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'category'),[
        'prompt' => 'Виберіть категорію'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
