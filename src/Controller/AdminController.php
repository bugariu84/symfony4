<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 12.02.2018
 * Time: 19:49
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 *
 * @Route("/admin")
 *
 * @package App\Controller
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_homepage")
     */
    public function index()
    {
        return new Response("Admin homepage");
    }
}