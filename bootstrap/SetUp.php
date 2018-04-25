<?php

namespace app\bootstrap;

use app\services\MailService;
use yii\base\BootstrapInterface;
use yii\mail\MailerInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = \Yii::$container;

        $container->setSingleton(MailService::class, [], [
            $app->params['adminEmail']
        ]);

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });
    }
}