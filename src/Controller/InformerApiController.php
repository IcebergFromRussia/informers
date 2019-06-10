<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use Swagger\Annotations as SWG;

class InformerApiController extends AbstractFOSRestController
{
    /**
     * @Route("/api/{user}/rewards", methods={"GET"})
     * @SWG\Response(
     *     response=200,
     *     description="Returns the rewards of an usersdsdsdsdd",
     *
     * )
     * @SWG\Parameter(
     *     name="order",
     *     in="query",
     *     type="string",
     *     description="The field used to order rewards"
     * )
     * @SWG\Tag(name="rewards")
     * @Security(name="Bearer")
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/InformerApiController.php',
        ]);
    }

//    /**
//     * @Route("/api/informer", name="informer_api")
//     */
//    public function index()
//    {
//        return $this->json([
//            'message' => 'Welcome to your new controller!',
//            'path' => 'src/Controller/InformerApiController.php',
//        ]);
//    }
}
