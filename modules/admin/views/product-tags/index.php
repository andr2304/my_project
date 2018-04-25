<?php

use app\models\Product;
use app\models\Tag;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\ProductTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-tag-index">

    <p>
        <?= Html::a('Create Product Tag', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    [
                        'attribute' => 'product_id',
                        'filter' => Product::find()->select(['name', 'id'])->indexBy('id')->column(),
                        'value' => 'product.name',
                    ],
                    [
                        'attribute' => 'tag_id',
                        'filter' => Tag::find()->select(['name', 'id'])->indexBy('id')->column(),
                        'value' => 'tag.name',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
