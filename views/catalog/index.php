<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

    <h2 class="title text-center">Features Items</h2>


        <div class="row">
            <div class="col-sm-12">
                <div class="category-tab"><!--category-tab-->
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tshirt" >
                            <?= ListView::widget([
                                'dataProvider' => $dataProvider,
                                'viewParams'   => [
                                    'count' => '3',
                                ],
                                'layout' => "{items}\n{pager}",
                                'itemView' => '_item',
                            ]); ?>
                        </div>
                    </div>
                </div><!--/category-tab-->

            </div>
        </div>

</div>
