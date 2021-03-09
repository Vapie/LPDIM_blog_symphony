<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
    public function index(): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }


    /**
     * @Route("/comment/new/{postid}", name="comment_new")
     */
    public function new(EntityManagerInterface $entityManager, Request $request, int $postid){
        $user = $entityManager->getRepository(User::class)->findOneBy(['username'=>'Vapie']);
        $post = $entityManager->getRepository(Post::class)->findOneBy(['id'=>$postid]);

        if($request->isMethod('POST')){

            $data = $request->get('form');
            $comment = new Comment();
            $comment->setAuthor($user);
            $comment->setPost($post);
            $comment->setContent($data['content']);
            $comment->setCreatedAt(new \DateTime('NOW'));
            $comment->setIsDeleted(false);
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_show',['id'=> $postid]);
        }
        return $this->redirectToRoute('post_show',['id'=>$postid,'error' => "Votre commentaire est giga chelou du coup ça marche pas"]);

    }


    /**
     * @Route("/comment/add", name="comment_add")
     */
    public function add(Request $request): Response
    {
        if($request -> isMethod('post')){

        }
        $form = $this->createFormBuilder()
            ->add('content', TextareaType::class)
            ->getForm();

        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
            'form' => $form->createView()
        ]);

    }



}
