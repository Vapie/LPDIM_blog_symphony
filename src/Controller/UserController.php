<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
       $users = $entityManager->getRepository(User::class)->findAll();


        return $this->render('user/index.html.twig', [ 'controller_name' => 'UserController',"users"=>$users]);
    }

}
