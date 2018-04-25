<?php

use app\models\Order;
use app\helpers\OrderHelper;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <? if($status) {
            echo Html::a('Вернуть на дороботку', ['complete', 'id' => $model->id, 'action' => 0], ['class' => 'btn btn-default']);
        } else{
            echo Html::a('Завершить', ['complete', 'id' => $model->id, 'action' => 1], ['class' => 'btn btn-success']);
        }
         ?>
    </p>
    <div class="box">
        <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'status',
                    'filter' => OrderHelper::statusList(),
                    'value' => function (Order $model) {
                        return OrderHelper::statusLabel($model->status);
                    },
                    'format' => 'raw',
                ],
                'name',
                'email:email',
                'phone',
                'address',
            ],
        ]) ?>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "{items}\n{pager}",
                'columns' => [
        //            [
        //                'attribute' => 'attribute_id',
        //                'value' => 'productAttribute.name',
        //            ],
                    //'value',
                    'id',
                    'name',
                    'qty_item',
                    'price',
                ],
            ]); ?>
            <p>Итого:</p>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'qty',
                    'sum',
                ],
            ]) ?>
      </div>
    </div>


</div>
