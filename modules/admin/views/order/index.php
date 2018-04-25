<?php

use app\helpers\OrderHelper;
use app\models\Order;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <p>
        <?//= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'created_at',
                    'updated_at',
                    //'qty',
                    'sum',
                    [
                        'attribute' => 'status',
                        'filter' => OrderHelper::statusList(),
                        'value' => function (Order $model) {
                            return OrderHelper::statusLabel($model->status);
                        },
                        'format' => 'raw',
                    ],
                    //'name',
                    //'email:email',
                    //'phone',
                    //'address',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
