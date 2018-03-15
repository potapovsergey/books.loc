<?php
/**
 * Created by PhpStorm.
 * User: Ден
 * Date: 09.05.2017
 * Time: 11:12
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $author app\models\Author*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin([
        'id'=>'author',
        'action'=>['books/author'],
        'method'=>'post'
    ]); ?>


    <?= $form->field($author, 'name')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Додати автора') ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
