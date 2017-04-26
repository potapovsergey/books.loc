<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19.04.2017
 * Time: 14:52
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $model app\models\LoginForm
 * @var $form ActiveForm
 */

?>
<div class="main-login container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <p>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </p>
    <div class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
        <a href="<?= Url::to('/main/reg') ?>" class="btn btn-info">Зарегистрироватся</a>
    </div>
    <?php ActiveForm::end(); ?>

    <?= Html::a('Забыли пароль?', ['/main/send-email']) ?>
</div><!-- main-login -->