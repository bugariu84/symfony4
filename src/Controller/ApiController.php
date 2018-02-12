<?php
/**
 * Created by PhpStorm.
 * User: bbugariu
 * Date: 12.02.2018
 * Time: 22:30
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 *
 * @Route("/api/v1")
 *
 * @package App\Controller
 */
class ApiController extends Controller
{
    /**
     * @Route("/", name="api_index")
     */
    public function index()
    {
        return new JsonResponse(["message"=> "This is a secured api"]);
    }
}