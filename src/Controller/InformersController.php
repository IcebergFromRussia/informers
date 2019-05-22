<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 22.05.2019
 * Time: 16:14
 */

namespace App\Controller;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;

class InformersController extends AbstractFOSRestController
{
    //  [GET] /informers
    /**
     *
     *
     * @SWG\Tag(name="informer")
     * @SWG\Response(
     *     response=200,
     *     description="Returns the rewards of an usersdsdsdsdd",
     *
     * )
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getInformersListAction()
    {
        return $this->json([
            'message' => 'getUser',
        ]);
    }

    // [GET] /informers/new
    public function newInformersAction()
    {
        return $this->json([
            'message' => 'newUser',
        ]);
    }

    public function reginaInformersAction(){
        return $this->json([
            'hi message' => 'Hello Regina',
        ]);
    }
}