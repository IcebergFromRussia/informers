<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 23.05.2019
 * Time: 23:43
 */

namespace App\Service;


use App\Entity\Users;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;

class UserService
{
    /**
     * @var Users
     */
    private $user;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
        $this->user = $this->userRepository->find(1);
    }

    /**
     * @return Users
     */
    public function getCurrentUser(): Users
    {
        return $this->user;
    }
}