<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 24.05.2019
 * Time: 1:37
 */

namespace App\Controller;

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
 * @RouteResource("InformerType", pluralize=false)
 */
class InformerTypeController extends AbstractFOSRestController
{

    public function __construct()
    {}

    /**
     * @SWG\Tag(name="InformerType")
     * @SWG\Response(
     *     response=200,
     *     description="Создание типа информера",
     * )
     * @SWG\Parameter(
     *     name="informerType",
     *     in="body",
     *     @SWG\Schema(ref=@Model(type=InformerType::class)),
     *     description="entity"
     * )
     *
     * @ParamConverter("informerType", converter="fos_rest.request_body")
     *
     * @param InformerType $informerType
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAction(InformerType $informerType){

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($informerType);
        $entityManager->flush();

        $data = [
            'id' => $informerType->getId(),
        ];
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="InformerType")
     * @SWG\Response(
     *     response=200,
     *     description="Список услуг",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=InformerType::class))
     *     )
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getListAction(){
        $informerTypes = $this->getDoctrine()->getRepository(InformerType::class)->findAll();
        $view = $this->view($informerTypes, 200);
        return $this->handleView($view);
    }

    /**
     * @SWG\Tag(name="InformerType")
     * @SWG\Response(
     *     response=200,
     *     description="получить данные типа информера",
     *     @Model(type=InformerType::class)
     * )
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction($id){
        $informerType = $this->getDoctrine()->getRepository(InformerType::class)->find($id);
        $view = $this->view($informerType, 200);
        return $this->handleView($view);
    }
}