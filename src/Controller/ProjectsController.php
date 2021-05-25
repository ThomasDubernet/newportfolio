<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProjectsController extends AbstractController {

  /**
     * @Route("/admin/projects", name="admin_projects")
     */
    public function index(): Response
    {
        return $this->render('projects/index.html.twig', [
            'pageActive' => 'projects'
        ]);
    }
}