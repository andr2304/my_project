<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$tagLinks = [];
foreach ($model->tags as $tag) {
    $tagLinks[] = Html::a(Html::encode($tag->name), ['tag', 'tag' => $tag->name]);
}
//debug($index);
?>
<?php if ($index%4==0):?>
    <div class="clearfix"></div>
<?php endif;?>
<div class="col-sm-3">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <p><?= Html::a(Html::img("@web/images/shop/{$model->img}", ['alt' => $model->name]), ['view', 'id' => $model->id]) ?></p>
                <h2>$<?= $model->price ?></h2>
                <p><?= Html::a(Html::encode($model->name), ['view', 'id' => $model->id]) ?></p>
                <a href="#" data-id="<?= $model->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                <div class="panel-body">
                    <p>Category: <?= $model->category ? Html::a(Html::encode($model->category->name), ['category', 'id' => $model->category->id]) : 'Без категории' ?></p>
                    <?php if ($tagLinks): ?>
                        <p>Tags: <?= implode(', ', $tagLinks) ?></p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
