<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Client;
use App\Entity\Utilisateur;

class ClientController extends Controller
{
    /**
     * @Route("/client", name="client")
     */
    public function addAction(Request $request)
    {
    $utilisateur = new Utilisateur();
    $client = new Client();
    $client->setNbAchats(0);
    $client->setUtilisateur($utilisateur->getId());
    $client->setDateInscription(new \Datetime());

    $form = $this->get('form.factory')->createBuilder(FormType::class, $utilisateur)
      ->add('Email',     EmailType::class)
      ->add('Mdp',       PasswordType::class)
      ->add('Nom',       TextType::class)
      ->add('Prenom',    TextType::class)
      ->add('Tel',       NumberType::class)
      ->add('Confirmer', SubmitType::class)
      ->getForm()
    ;

    if ($request->isMethod('POST')) {
      $form->handleRequest($request);

      if ($form->isValid()){
        $em1 = $this->getDoctrine()->getManager();
        $em1->persist($utilisateur);
        $em1->flush();
        $em2 = $this->getDoctrine()->getManager();
        $em2->persist($client);
        $em2->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Client bien enregistré.');

        return $this->redirectToRoute('mainpage');
      }
    }

    return $this->render('client\addclient.html.twig', array(
      'form' => $form->createView(),
    ));
  }
}
?>