<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Symfony\Component\Routing\Annotation\Route;

/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 19.02.2018
 * Time: 17:31
 */

/**
 * Class PostController
 *
 * @Route("user/posts")
 */
class PostController extends AbstractController
{
    /**
     * TODO: add user access posts here
     * create, view his posts, update
     *
     * Add a manager to be used in api controller
     */

    /**
     * List all user posts
     */
    public function index() {}

    /**
     * Create a new post
     */
    public function create() {}

    /**
     * Edit a post
     */
    public function edit() {}

    /**
     * Remove a post
     */
    public function remove() {}
}