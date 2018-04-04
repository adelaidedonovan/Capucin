<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Tuteur;
use App\Form\TuteurType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TuteurController extends Controller
{

    /**
     * @Route("/ajoutTuteur/", name="ajoutTuteur")
     */
    public function ajoutTuteur(Request $request)
    {


        $item = new Tuteur();
        $form = $this->createForm(TuteurType::class, $item);

        // Par défaut, le formulaire renvoie une demande POST au même contrôleur qui la restitue.
        if ($request->isMethod('POST')) {

            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                if ($form->isSubmitted() && $form->isValid()) {
                    $item = $form->getData();
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($item);
                    $em->flush();
                    return $this->redirectToRoute('listeEntrepriseEleve');
                }
                return $this->redirectToRoute('listeEntrepriseEleve');
            }
        }
        return $this->render('tuteur/ajoutTuteur.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/listeTuteurByEntreprise/{id}", name="listeTuteurByEntreprise")
     */
    public function listeTuteurByEntreprise($id)
    {
        $listeTuteurByEntreprise = $this->getDoctrine()
            ->getRepository(Tuteur::class)
            ->findBy(array('entreprise' => $id));
        return $this->render('tuteur/listeTuteurByEntrepriseEleve.html.twig', compact('listeTuteurByEntreprise'));


    }
}