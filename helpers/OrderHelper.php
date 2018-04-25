<?php

namespace app\helpers;

use app\models\Order;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class OrderHelper
{
    public static function statusList(): array
    {
        return [
            Order::STATUS_WAIT => 'Wait',
            Order::STATUS_COMPLETE => 'Complete',
        ];
    }

    public static function statusName($status): string
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status): string
    {
        switch ($status) {
            case Order::STATUS_WAIT:
                $class = 'label label-danger';
                break;
            case Order::STATUS_COMPLETE:
                $class = 'label label-success';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), [
            'class' => $class,
        ]);
    }
}