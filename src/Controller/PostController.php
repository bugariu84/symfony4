<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 19.02.2018
 * Time: 20:24
 */

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PostController
 * @package App\Controller
 *
 * @Route("/api/post")
 */
class PostController extends AbstractApiController
{
    /**
     * @Route("/list", name="api_post_list")
     * @param Request $request
     * @param EntityManagerInterface $em
     *
     * @return JsonResponse
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        return new JsonResponse(['posts' => $em->getRepository('App:Post')->getAll()]);
    }
}