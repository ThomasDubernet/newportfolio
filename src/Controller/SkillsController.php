<?php

namespace App\Controller;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SkillsController extends AbstractController {

    private $em;
    private $skillRepo;

    public function __construct(EntityManagerInterface $em, SkillRepository $skillRepo)
    {
        $this->em = $em;
        $this->repo = $skillRepo;
    }

    /**
     * @Route("/admin/skills", name="admin_skills")
     */
    public function index(): Response
    {
        $skills = $this->em->getRepository(Skill::class)->findAll();

        return $this->render('skills/index.html.twig', [
            'pageActive' => 'skills',
            'skills' => $skills
        ]);
    }

    /**
     * @Route("/admin/skills/{id}", name="admin_skills_show")
     */
    public function show(string $id): Response
    {
        $skill = $this->repo->find($id);

        return $this->render('skills/show.html.twig', [
            'pageActive' => 'skills',
            'skill' => $skill
        ]);
    }

    /**
     * @Route("/admin/skills/create", name="admin_skills_create")
     */
    public function create(Request $request): Response
    {
        $skill = new Skill();
        $form = $this->createForm(ProductType::class, $skill);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($skill);
            return $this->redirectToRoute("index");
        }

        return $this->render('skills/create.html.twig', [
            'pageActive' => 'skills',
            'skill' => $skill,
            'form' => $form
        ]);
    }

    /**
     * @Route("/admin/skills/edit/{id}", name="admin_skills_edit")
     */
    public function edit(string $id, Request $request): Response
    {

        $skill = $this->repo->find($id);
        $form = $this->createForm(SkillType::class, $skill);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->flush();
            return $this->redirectToRoute("admin_skills");
        }

        return $this->render('skills/edit.html.twig', [
            'pageActive' => 'skills',
            'skill' => $skill,
            'form' => $form->createView()
        ]);
    }
}