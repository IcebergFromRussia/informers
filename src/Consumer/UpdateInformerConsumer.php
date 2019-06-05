<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 16.05.2019
 * Time: 0:26
 */

namespace App\Consumer;


use App\Service\RabbitService;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class UpdateInformerConsumer implements ConsumerInterface
{
    /**
     * @var RabbitService
     */
    private $rabbitService;

    public function __construct(RabbitService $rabbitService)
    {
        $this->rabbitService = $rabbitService;
    }

    /**
     * @param AMQPMessage $msg The message
     * @return mixed false to reject and requeue, any other value to acknowledge
     */
    public function execute(AMQPMessage $msg)
    {
        $this->rabbitService->updateInformer($msg);
//        // TODO: Implement execute() method.
//        echo 'Ну тут типа сообщение пытаюсь отправить: '.$msg->getBody().PHP_EOL;
//        echo 'Отправлено успешно!...';
    }
}