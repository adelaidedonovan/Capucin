<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EntrepriseController extends Controller
{



    /**
     * @Route("/listeEntrepriseEleve", name="listeEntrepriseEleve")
     */
    public function listeEntrepriseEleve()
    {
        $listeEntreprise = $this->getDoctrine()
            ->getRepository(Entreprise::class)
            ->findAll();
        return $this->render('entreprise/listeEntrepriseEleve.html.twig', compact('listeEntreprise'));


    }







    /**
     * @Route("/ajoutEntreprise", name="ajoutEntreprise")
     */
    public function ajoutEntreprise(Request $request)
    {
        $item = new Entreprise();
        $form=$this->createForm(EntrepriseType::class,$item);


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
        return $this->render('entreprise/ajoutStage.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}
