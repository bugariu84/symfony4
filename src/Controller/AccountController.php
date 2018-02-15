<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AccountController
 * @Route("/user")
 *
 * @package App\Controller
 */
class AccountController extends Controller
{
    /**
     * @Route("/account", name="user_account")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('user/account.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}
