<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $posts = $entityManager->getRepository(Post::class)->findAll();
        return $this->render('post/index.html.twig', [ 'controller_name' => 'PostController',"posts"=>$posts]);


    }


    /**
     * @Route("/post/show/{id}", name="post_show")
     */
    public function show(EntityManagerInterface $entityManager, $id): Response
    {

        $post = $entityManager->getRepository(Post::class)->findOneBy( ['id'=> $id] );
        $comments = $entityManager->getRepository(Comment::class)->findBy(["post" => $id]);
        $commentForm = $this->createFormBuilder()->setAction($this
            ->generateUrl('comment_new',['postid'=>$id]))
            ->add('content',TextareaType::class)
            ->add('save',SubmitType::class)
            ->getForm();





        return $this->render('post/show.html.twig', [ 'controller_name' => 'PostController',"post"=>$post,'comments'=>$comments,'form'=>$commentForm->createView()]);


    }
}
