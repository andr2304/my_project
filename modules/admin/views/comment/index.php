<?php

use app\models\Product;
use app\models\User;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <p>
        <?//= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'text',
                    //'users_id',
                    [
                        'attribute' => 'users_id',
                        'filter' => User::find()->select(['username', 'id'])->indexBy('id')->column(),
                        'value' => 'users.username',
                        'label' => 'User',
                    ],
                    //'product_id',
                    [
                        'attribute' => 'product_id',
                        'filter' => Product::find()->select(['name', 'id']),
                        'value' => 'product.name',
                        'label' => 'ProductName',
                    ],
                    'date',
//                    [
//                        'attribute' => 'date',
//                        'filter' => DatePicker::widget([
//                            'model' => $searchModel,
//                            'attribute' => 'date_from',
//                            'attribute2' => 'date_to',
//                            'type' => DatePicker::TYPE_RANGE,
//                            'separator' => '-',
//                            'pluginOptions' => [
//                                'todayHighlight' => true,
//                                'autoclose'=>true,
//                                'format' => 'yyyy-mm-dd',
//                            ],
//                        ]),
//                        'format' => 'datetime',
//                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
