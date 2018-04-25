<?php

namespace app\services;

use app\models\Order;
use app\models\form\ContactForm;
use yii\helpers\StringHelper;
use yii\mail\MailerInterface;

class MailService
{
    private $adminEmail;
    private $mailer;

    public function __construct($adminEmail, MailerInterface $mailer)
    {
        $this->adminEmail = $adminEmail;
        $this->mailer = $mailer;
    }

    public function order_send(Order $form, $params): void
    {
        $sent = $this->mailer->compose(StringHelper::basename(get_class($form)), $params)
            ->setFrom($this->adminEmail)
            ->setTo($form->email)
            ->setSubject('Заказ')
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        }
    }
    public function contact_send(ContactForm $form): bool
    {
        $sent = $this->mailer->compose()
            ->setFrom($form->email)
            ->setTo($this->adminEmail)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();

        if (!$sent) {
            throw new \RuntimeException('Sending error.');
        } else {
            return true;
        }
    }
}