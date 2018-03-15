<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderBooks */

$this->title = 'Update Order Books: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
