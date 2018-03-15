<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Create Order';
$session = Yii::$app->session;
?>
<div class="order-index">

    <p>
        <?php echo $this->render('/cart/cart_view', compact('session')); ?>
    </p>
    <?php if ($session['cart'] != NULL): ?>
        <?php if (Yii::$app->user->isGuest):?>
            <?php $form = ActiveForm::begin([
                'action' => ['/order/create', 'id' => false],
                'method' => 'post',
            ]); ?>

            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'number_post')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Заказать', ['class' => 'btn btn-warning order-goods']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        <?php else: ?>
            <?php $form = ActiveForm::begin([
                'action' => ['/order/create', 'id' => true],
                'method' => 'post',
            ]); ?>

            <?= $form->field($model, 'number_post')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Заказать', ['class' => 'btn btn-warning order-goods']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        <?php endif;?>
    <?php endif;?>
</div>
