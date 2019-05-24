<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 22.05.2019
 * Time: 16:14
 */

namespace App\Controller;


use App\Entity\Informer;
use App\Entity\InformerType;
use App\Entity\ServiceData;
use App\Entity\ServiceDataType;
use App\Entity\Users;
use App\Service\UserService;
use FOS\RestBundle\Controller\AbstractFOSRestController;

use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @RouteResource("Informer", pluralize=false)
 */
class InformerController extends AbstractFOSRestController
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
    }

    /**
     * @SWG\Tag(name="Informer")
     * @SWG\Response(
     *     response=200,
     *     description="Создание информера",
     * )
     * @SWG\Parameter(
     *     name="informer",
     *     in="body",
     *     @SWG\Schema(ref=@Model(type=Informer::class)),
     *     description="entity"
     * )
     *
     * @ParamConverter("informer", converter="fos_rest.request_body")
     *
     * @param Informer $informer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAction(Informer $informer){

        $entityManager = $this->getDoctrine()->getManager();

        $currentUser = $this->userService->getCurrentUser();
        /**
         * @var InformerType $informerType
         */
        $informerType = $this->getDoctrine()->getRepository(InformerType::class)
            ->find($informer->getType());
        /**
         * @var ServiceData $serviceData
         */
        $serviceData = $this->getDoctrine()->getRepository(ServiceData::class)
            ->find($informer->getServiceData());

        $informer->setType($informerType)
            ->setUserCreated($currentUser)
            ->setUserChanged($currentUser)
            ->setServiceData($serviceData);


        $entityManager->persist($informer);
        $entityManager->flush();

        $data = [
            'id' => $informer->getId(),
        ];
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="Informer")
     * @SWG\Response(
     *     response=200,
     *     description="Список информеров",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Informer::class))
     *     )
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getListAction(){
        $informers = $this->getDoctrine()->getRepository(Informer::class)->findAll();
        $view = $this->view($informers, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="Informer")
     * @SWG\Response(
     *     response=200,
     *     description="получить данные информера",
     *     @Model(type=Informer::class)
     * )
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction($id){
        $informer = $this->getDoctrine()->getRepository(Informer::class)->find($id);
        $view = $this->view($informer, 200);
        return $this->handleView($view);
    }

}