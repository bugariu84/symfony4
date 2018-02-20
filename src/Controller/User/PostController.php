<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 19.02.2018
 * Time: 20:54
 */

namespace App\Controller\User;

use App\Controller\AbstractApiController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 *
 * @Route("/api/user/post")
 */
class PostController extends AbstractApiController
{
    /**
     * @Route("/list", name="api_user_post_list")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        $posts = $em->getRepository('App:Post')->getUserPosts($this->getUser());
        dump($posts);
        return new JsonResponse(['list' => json_encode($posts)]);
    }
}