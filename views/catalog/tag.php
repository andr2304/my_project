<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $tag app\models\Category */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $tag->name;

$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['tag'] = $tag;
?>
<div class="catalog-index">

    <h2 class="title text-center"><?= Html::encode($this->title) ?></h2>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'itemView' => '_item',
    ]); ?>
</div>
