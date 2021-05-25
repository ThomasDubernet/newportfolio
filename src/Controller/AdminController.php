<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController {

  /**
     * @Route("/admin", name="admin_index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'pageActive' => 'home'
        ]);
    }
  
    /**
     * @Route("/admin/account/{id}", name="admin_account")
     */
    public function account(string $id): Response
    {
        if ($id) {
            $repo = $this->getDoctrine()->getRepository(User::class);
            $user = $repo->find($id);
        }
        return $this->render('admin/account.html.twig', [
            'pageActive' => 'account',
            'currentUser' => $user
        ]);
    }
}