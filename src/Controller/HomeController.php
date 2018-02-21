<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 21.02.2018
 * Time: 16:18
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function home()
    {
        return $this->render('home.html.twig');
    }
}