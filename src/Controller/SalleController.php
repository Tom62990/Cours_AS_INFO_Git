<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Salle;
class SalleController extends Controller
{
    /**
     * @Route("/ajout_salle", name="ajout_salle")
     */

  public function addAction(Request $request)
  {
    $salle = new Salle();

    $form = $this->get('form.factory')->createBuilder(FormType::class, $salle)
      ->add('Nom',         TextType::class)
      ->add('Nb_Places',   NumberType::class)
      ->add('Confirmer',   SubmitType::class)
      ->getForm()
    ;

    if ($request->isMethod('POST')) {
      $form->handleRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($salle);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Salle bien enregistrée.');

        return $this->redirectToRoute('mainpage');
      }
    }

    return $this->render('salle\addsalle.html.twig', array(
      'form' => $form->createView(),
    ));
  }
}
?>