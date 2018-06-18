<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;
use App\Entity\Film;

class AfficheFilmsController extends Controller
{
    /**
     * @Route("/affiche_films", name="affiche_films")
     */
    public function myFindAll()
    {
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('Repository\FilmRepository')
        ;
        
        $listFilms = $repository->findAll();
        
        foreach ($listFilms as $film) {
            echo $film->getContent();
        }
    }
}
?>