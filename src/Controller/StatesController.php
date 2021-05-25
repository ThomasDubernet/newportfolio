<?php

namespace App\Controller;

use App\Entity\State;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class StatesController extends AbstractController {

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

  /**
     * @Route("/admin/states", name="admin_states")
     */
    public function index(): Response
    {
        $states = $this->em->getRepository(State::class)->findAll();

        return $this->render('states/index.html.twig', [
            'pageActive' => 'states',
            'states' => $states
        ]);
    }
}