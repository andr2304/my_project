<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Value */

$this->title = 'Create Value';
$this->params['breadcrumbs'][] = ['label' => 'Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="value-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>