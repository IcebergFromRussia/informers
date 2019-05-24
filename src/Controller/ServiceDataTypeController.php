<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 22.05.2019
 * Time: 18:36
 */

namespace App\Controller;


use App\Entity\ServiceDataType;
use FOS\RestBundle\Controller\AbstractFOSRestController;

use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @RouteResource("ServiceDataType", pluralize=false)
 */
class ServiceDataTypeController extends AbstractFOSRestController
{
    /**
     * @SWG\Tag(name="ServiceDataType")
     * @SWG\Response(
     *     response=200,
     *     description="Тип Услуги создан",
     * )
     * @SWG\Parameter(
     *     name="serviceDataType",
     *     in="body",
     *     @SWG\Schema(ref=@Model(type=ServiceDataType::class)),
     *     description="entity"
     * )
     * @ParamConverter("serviceDataType", converter="fos_rest.request_body")
     *
     * @param ServiceDataType $serviceDataType
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAction(ServiceDataType $serviceDataType){

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($serviceDataType);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        $data = [
            'id' => $serviceDataType->getId(),
        ];
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="ServiceDataType")
     * @SWG\Response(
     *     response=200,
     *     description="Список типов услуги",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=ServiceDataType::class))
     *     )
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getListAction(){
        $types = $this->getDoctrine()->getRepository(ServiceDataType::class)->findAll();
        $view = $this->view($types, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="ServiceDataType")
     * @SWG\Response(
     *     response=200,
     *     description="Тип услуги",
     *     @Model(type=ServiceDataType::class)
     * )
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction($id){
        $types = $this->getDoctrine()->getRepository(ServiceDataType::class)->find($id);
        $view = $this->view($types, 200);
        return $this->handleView($view);
    }
}