<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 23.05.2019
 * Time: 13:39
 */

namespace App\Controller;

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
 * @RouteResource("ServiceData", pluralize=false)
 */
class ServiceDataController extends AbstractFOSRestController
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
     * @SWG\Tag(name="ServiceData")
     * @SWG\Response(
     *     response=200,
     *     description="Создание услуги",
     * )
     * @SWG\Parameter(
     *     name="serviceData",
     *     in="body",
     *     @SWG\Schema(ref=@Model(type=ServiceData::class)),
     *     description="entity"
     * )
     *
     * @ParamConverter("serviceData", converter="fos_rest.request_body")
     *
     * @param ServiceData $serviceData
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAction(ServiceData $serviceData){

        $entityManager = $this->getDoctrine()->getManager();

        $currentUser = $this->userService->getCurrentUser();
        /**
         * @var ServiceDataType $serviceDataType
         */
        $serviceDataType = $this->getDoctrine()->getRepository(ServiceDataType::class)
            ->find($serviceData->getType());

        $serviceData->setType($serviceDataType)
            ->setUserCreated($currentUser)
            ->setUserChanged($currentUser);

        $entityManager->persist($serviceData);
        $entityManager->flush();

        $data = [
            'id' => $serviceData->getId(),
        ];
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="ServiceData")
     * @SWG\Response(
     *     response=200,
     *     description="Список услуг",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=ServiceData::class))
     *     )
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getListAction(){
        $serviceDatas = $this->getDoctrine()->getRepository(ServiceData::class)->findAll();
        $view = $this->view($serviceDatas, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="ServiceData")
     * @SWG\Response(
     *     response=200,
     *     description="получить данные услуги",
     *     @Model(type=ServiceData::class)
     * )
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction($id){
        $serviceData = $this->getDoctrine()->getRepository(ServiceData::class)->find($id);
        $view = $this->view($serviceData, 200);
        return $this->handleView($view);
    }
}