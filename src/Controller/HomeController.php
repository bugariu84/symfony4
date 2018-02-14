<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 12.02.2018
 * Time: 19:39
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        return new Response("Homepage 2");
    }
}