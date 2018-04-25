<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];

$crumbs = [];
$parent = $model->category;
$crumbs[] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
while ($parent = $parent->parent) {
    $crumbs[] = ['label' => $parent->name, 'url' => ['category', 'id' => $parent->id]];
}
$this->params['breadcrumbs'] = array_merge($this->params['breadcrumbs'], array_reverse($crumbs));

$this->params['breadcrumbs'][] = $this->title;
$this->params['category'] = $model->category;

$tagLinks = [];
foreach ($model->tags as $tag) {
    $tagLinks[] = Html::a(Html::encode($tag->name), ['tag', 'tag' => $tag->name]);
}
//debug($model->tags);
?>
<!--            --><?//= DetailView::widget([
//                'model' => $model,
//                'attributes' => [
//                    'id',
//                    [
//                        'attribute' => 'category_id',
//                        'value' => ArrayHelper::getValue($model, 'category.name'),
//                    ],
//                    'name',
//                    'price',
//                    [
//                        'label' => 'Tags',
//                        'value' => implode(', ', ArrayHelper::map($model->tags, 'id', 'name')),
//                    ],
//                ],
//            ]) ?>

<div class="col-sm-12 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <?= Html::img("@web/images/shop/{$model->img}", ['alt' => $model->name])?>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <?php if($model->new): ?>
                    <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival'])?>
                <?php endif?>
<!--                --><?php //if($model->sale): ?>
<!--                    --><?//= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival'])?>
<!--                --><?php //endif?>
                <h2><?= $model->name?></h2>
                <span>
									<span>US $<?= $model->price?></span>
									<label>Quantity:</label>
									<input type="text" value="1" id="qty" />
									<a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $model->id])?>" data-id="<?= $model->id?>" class="btn btn-fefault add-to-cart cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </a>
								</span>
                <p>Категория: <?= $model->category ? Html::a(Html::encode($model->category->name), ['category', 'id' => $model->category->id]) : 'Без категории' ?></p>
                <?php if ($tagLinks): ?>
                    <p>Метки: <?= implode(', ', $tagLinks) ?></p>
                <?php endif; ?>
                <p>Описание: <?= Yii::$app->formatter->asNtext($model->content) ?></p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        [
                            'attribute' => 'attribute_id',
                            'value' => 'productAttribute.name',
                            'label' => 'Характеристики',
                        ],
                        [
                            'attribute' => 'value',
                            'label' => 'Значения',
                        ],
                        //'value',
                    ],
                ]); ?>
            </div><!--/product-information-->
        </div>
    </div>
</div>
<div class="tab-pane fade active in" id="reviews" >
    <div class="clearfix"></div>
    <?php if(!Yii::$app->user->isGuest): ?>
    <?php $form = \yii\widgets\ActiveForm::begin([
        'action'=>['catalog/comment', 'id'=>$model->id],
        'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
            <p><b>Write Your Review</b></p>
            <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Write Message'])->label(false)?>
        <button type="submit" class="btn send-btn">Post Comment</button>
    <?php \yii\widgets\ActiveForm::end();?>
    <?php else:?>
        <p>Нужно залогинится!</p>
    <?php endif;?>

    <div class="col-sm-12">
        <?php foreach ($model->comment as $comment):?>
        <div class="comments">
            <ul>
                <li><a href=""><i class="fa fa-user"></i><?= $comment->users->username;?></a></li>
                <li><a href=""><i class="fa fa-calendar-o"></i><?= $comment->date;?></a></a></li>
            </ul>
            <p class="comments_text"><?= $comment->text;?></p>
        </div>
        <?php endforeach;?>
    </div>
</div>