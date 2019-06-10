<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 24.05.2019
 * Time: 15:36
 */

namespace App\Service;


use App\Entity\Informer;
use App\Entity\InformerStatus;
use App\Repository\InformerRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\ORMException;
use OldSound\RabbitMqBundle\RabbitMq\Producer;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitService
{
    /**
     * @var Producer
     */
    protected $producer;
    /**
     * @var InformerUpdaterService
     */
    private $updater;
    /**
     * @var InformerRepository
     */
    private $informerRepository;
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(Producer $producer,
                                InformerUpdaterService $updater,
                                InformerRepository $informerRepository,
                                EntityManager $entityManager)
    {
        $this->producer = $producer;
        $this->updater = $updater;
        $this->informerRepository = $informerRepository;
        $this->entityManager = $entityManager;
    }

    public function sendMessageToUpdateInformer(Informer $informer)
    {
        $data = [
            'task'=>'updateInformer',
            'info' =>[
                    'id' => $informer->getId()
                ],
        ];
        $informer->setStatus(InformerStatus::NEED_TO_UPDATE);
        $this->producer->publish(json_encode($data));
    }

    /**
     * @param AMQPMessage $msg
     */
    public function updateInformer(AMQPMessage $msg){
        $json = json_decode($msg->getBody(), true);

        $informer = $this->informerRepository->find($json['info']['id']);
        $this->updater->updateInformer($informer);
        try {
            $this->entityManager->persist($informer);
            $this->entityManager->flush();
        } catch (ORMException $e) {
        }
    }
}