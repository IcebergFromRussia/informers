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
}