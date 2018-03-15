<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderBooks */

$this->title = 'Create Order Books';
$this->params['breadcrumbs'][] = ['label' => 'Order Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-books-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
