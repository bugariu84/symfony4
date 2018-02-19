<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 12.02.2018
 * Time: 19:39
 */

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function homepage(EntityManagerInterface $entityManager)
    {
        $posts = $entityManager->getRepository('App:Post')->getAll();

        return $this->render('home.html.twig', [
            'posts' => $posts,
        ]);
    }
}