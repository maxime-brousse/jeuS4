<?php

namespace App\Controller;

use App\Entity\Parties;
use App\Form\PartiesType;
use App\Repository\PartiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/parties")
 */
class PartiesController extends AbstractController
{
    /**
     * @Route("/", name="parties_index", methods={"GET"})
     */
    public function index(PartiesRepository $partiesRepository): Response
    {
        return $this->render('admin/parties/index.html.twig', [
            'parties' => $partiesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parties_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $party = new Parties();
        $form = $this->createForm(PartiesType::class, $party);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($party);
            $entityManager->flush();

            return $this->redirectToRoute('parties_index');
        }

        return $this->render('admin/parties/new.html.twig', [
            'party' => $party,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parties_show", methods={"GET"})
     */
    public function show(Parties $party): Response
    {
        return $this->render('admin/parties/show.html.twig', [
            'party' => $party,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parties_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Parties $party): Response
    {
        $form = $this->createForm(PartiesType::class, $party);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parties_index', [
                'id' => $party->getId(),
            ]);
        }

        return $this->render('admin/parties/edit.html.twig', [
            'party' => $party,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parties_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Parties $party): Response
    {
        if ($this->isCsrfTokenValid('delete'.$party->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($party);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parties_index');
    }
}
