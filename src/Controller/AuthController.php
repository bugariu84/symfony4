<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends AbstractApiController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     *
     * @param Request $request
     *
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function login(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        $user = $em->getRepository('App:User')->findOneBy(['email' => $email]);
        $isPasswordValid = $encoder->isPasswordValid($user, $password);

        if ($isPasswordValid) {
            return new JsonResponse(['success' => true, 'user' => $user->getApiKey()]);
        }

        return new JsonResponse(['success' => false, 'params' => [
            'email'
        ]]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }
}
