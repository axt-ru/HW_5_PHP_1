<?php
/**
 * Главный интерфейс
 */
interface INotification
{
    public function send($data);
}

/**
 * Приложение
 */
class ApplicationSender implements INotification
{
    public function send($data)
    {
        echo "Отправка оповещения: <strong>" . $data . "</strong><br/>";
    }
}

/**
 * Декоратор оповещений
 */
abstract class NotificationDecorator implements INotification
{
    protected $notifier;
    public function __construct(INotification $notifier)
    {
        $this->notifier = $notifier;
    }
    public function send($data)
    {
        $this->notifier->send($data);
    }
}

/**
 * Отправка оповещения email
 */

class EmailNotification extends NotificationDecorator
{
    public function send($data)
    {
        echo "Отправка оповещения на email: <strong>" . $data . "</strong><br/>";
        $this->notifier->send($data);
    }
}

/**
 * Отправка оповещения SMS
 */

class SMSNotification extends NotificationDecorator
{
    public function send($data)
    {
        echo "Отправка оповещения SMS: <strong>" . $data . "</strong><br/>";
        $this->notifier->send($data);
    }
}

/**
 * Отправка оповещения Chrome Notification
 */

class CNNotification extends NotificationDecorator
{
    public function send($data)
    {
        echo "Отправка оповещения Chrome Notification: <strong>" . $data . "</strong><br/>";
        $this->notifier->send($data);
    }
}
$notification = new ApplicationSender();
$notification = new EmailNotification($notification);
$notification = new SMSNotification($notification);
$notification = new CNNotification($notification);
$notification->send("Паттерн Декоратор работает!");
