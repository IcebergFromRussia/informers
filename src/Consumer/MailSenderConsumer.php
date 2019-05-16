<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 16.05.2019
 * Time: 0:26
 */

namespace App\Consumer;


use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class MailSenderConsumer implements ConsumerInterface
{

    /**
     * @param AMQPMessage $msg The message
     * @return mixed false to reject and requeue, any other value to acknowledge
     */
    public function execute(AMQPMessage $msg)
    {
        $json = json_decode($msg->getBody());
        var_dump($json);
        var_dump($msg->getBody());

        foreach ($json as $element){
            echo $element.PHP_EOL;
        }
//        // TODO: Implement execute() method.
//        echo 'Ну тут типа сообщение пытаюсь отправить: '.$msg->getBody().PHP_EOL;
//        echo 'Отправлено успешно!...';
    }
}