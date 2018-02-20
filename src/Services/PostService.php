<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 20.02.2018
 * Time: 16:54
 */

namespace App\Services;

use App\Entity\Post;
use Pagerfanta\Pagerfanta;

class PostService
{
    /**
     * Transform Post obj from db to client
     *
     * @param Pagerfanta $pagination
     * @return array
     */
    public function transform(Pagerfanta $pagination): array
    {
        $transformed = [];

        foreach ($pagination->getCurrentPageResults() as $post) {
            if ($post instanceof Post) {
                $model = [];
                $model['id'] = $post->getId();
                $model['title'] = $post->getTitle();
                $model['body'] = $post->getBody();
                $model['user_id'] = $post->getUser()->getId();
                $model['created_at'] = $post->getCreatedAt()->getTimestamp();

                array_push($transformed, $model);
            }
        }

        return $transformed;
    }

    /**
     * Transform from client to db
     */
    public function reverseTransform()
    {

    }
}