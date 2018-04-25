<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="box">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    //'auth_key',
                   // 'password_hash',
                    //'password_reset_token',
                    'email:email',
                    //'email_confirm_token:email',
                    //'status',
                    [
                        'attribute' => 'created_at',
                        'format' => 'date',
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => 'date',
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
