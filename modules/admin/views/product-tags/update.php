<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductTag */

$this->title = 'Update Product Tag: ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Product Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'tag_id' => $model->tag_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-tag-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
