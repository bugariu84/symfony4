<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 16.02.2018
 * Time: 14:43
 */

namespace App\Controller;


use App\Entity\Post;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 * @package App\Controller
 *
 * @Route("/posts")
 */
class PostController extends Controller
{
    /**
     * @Route("/", name="posts_index")
     *
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $user = $this->getUser();
        $posts = $entityManager->getRepository('App:Post')->getUserPosts($user);

        return $this->render('posts/index.html.twig', [
            'posts' => $posts,
            'user' => $user
        ]);
    }

    /**
     * @Route("/create", name="post_create")
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(PostType::class, new Post());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $post->setUser($this->getUser());
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('posts_index');
        }

        return $this->render('posts/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="post_edit", methods={"GET", "POST"})
     *
     * @param int $id
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editForm(int $id, Request $request, EntityManagerInterface $entityManager)
    {
        $post = $entityManager->getRepository('App:Post')->find($id);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('post_item', ['id' => $post->getId()]);
        }

        return $this->render('posts/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView()
        ]);
    }

    public function update()
    {

    }

    /**
     * @Route("/{id}", name="post_item")
     *
     * @param string $id
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getPost($id, EntityManagerInterface $entityManager)
    {
        $user = $this->getUser();
        $post = $entityManager->getRepository('App:Post')->find($id);

        return $this->render('posts/post.html.twig', [
            'user' => $user,
            'post' => $post
        ]);
    }
}