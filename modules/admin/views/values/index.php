<?php

use app\models\Attribute;
use app\models\Product;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\search\ValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Values';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="value-index">

    <p>
        <?= Html::a('Create Value', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    'product_id',
                    [
                        'attribute' => 'attribute_id',
                        'filter' => Attribute::find()->select(['name', 'id'])->indexBy('id')->column(),
                        'value' => 'productAttribute.name',
                    ],
                    'value',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
