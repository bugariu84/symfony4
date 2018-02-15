<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     *
     * @param Request $request
     *
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(RegisterType::class, new User());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $em->persist($user);
            $em->flush();

            // TODO: send a validation email with a redirect link to activate account
            return $this->redirectToRoute('user_account');
        }

        return $this->render('user/register.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
