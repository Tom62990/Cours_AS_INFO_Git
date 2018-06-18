<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Film;

class FilmController extends Controller
{
    /**
     * @Route("/ajout_film", name="ajout_film")
     */

    public function addAction(Request $request)
    {
    $film = new Film();

    $form = $this->get('form.factory')->createBuilder(FormType::class, $film)
      ->add('Titre',         TextType::class)
      ->add('Realisateur',   TextType::class)
      ->add('Description',   TextareaType::class)
      ->add('Theme',         TextType::class)
      ->add('Duree',         NumberType::class)
      ->add('Affiche',       UrlType::class)
      ->add('Affiche_alt',   TextType::class)
      ->add('BA',            UrlType::class)
      ->add('Confirmer',     SubmitType::class)
      ->getForm()
    ;

    if ($request->isMethod('POST')) {
      $form->handleRequest($request);

      if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($film);
        $em->flush();

        $request->getSession()->getFlashBag()->add('notice', 'Film bien enregistré.');

        return $this->redirectToRoute('mainpage');
      }
    }

    return $this->render('film\addfilm.html.twig', array(
      'form' => $form->createView(),
    ));
    }
}
?>