<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 19.02.2018
 * Time: 20:24
 */

namespace App\Controller;

use App\Repository\PostRepository;
use App\Services\PostService;
use Symfony\Component\HttpFoundation\Response;
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
     * Get latest post
     *
     * @Route("/list", name="api_post_list")
     * @param PostRepository $postRepository
     * @param PostService $postService
     * @return Response
     */
    public function index(PostRepository $postRepository, PostService $postService) : Response
    {
        $pager = $postRepository->findLatest();
        $posts = $postService->transform($pager);
        $data = [
            'total' => $pager->getNbResults(),
            'count' => count($posts),
            'list' => $posts
        ];

        return $this->jsonResponse($data);
    }
}