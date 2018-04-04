<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class StageController extends Controller
{

    /**
     * @Route("/ajoutStage/", name="ajoutStage")
     */
    public function ajoutStage(Request $request)
    {



        $item = new Stage();
        $form=$this->createForm(StageType::class,$item);

        // Par défaut, le formulaire renvoie une demande POST au même contrôleur qui la restitue.
        if ($request->isMethod('POST')) {

            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                if ($form->isSubmitted() && $form->isValid()) {
                    $item = $form->getData();
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($item);
                    $em->flush();
                    return $this->redirectToRoute('indexEleve');
                }
                return $this->redirectToRoute('indexEleve');
            }
        }
        return $this->render('entreprise/ajoutStage.html.twig', array(
            'form' => $form->createView(),
        ));
    }









    /**
     * @Route("/listeStageByUser/", name="listeStageByUser")
     */
    public function listeStageByUser()
    {
        $listeStageByUser = $this->getDoctrine()
            ->getRepository(Stage::class)
            ->findAll();
        return $this->render('stage/listeStageByUser.html.twig', compact('listeStageByUser'));


    }
}
