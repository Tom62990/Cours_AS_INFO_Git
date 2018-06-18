<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Entity\Film;
use Entity\Salle;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeanceRepository")
 */
class Seance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $heure;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_place;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_places_restantes;

    public function getId()
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getPrixPlace(): ?float
    {
        return $this->prix_place;
    }

    public function setPrixPlace(float $prix_place): self
    {
        $this->prix_place = $prix_place;

        return $this;
    }

    public function getNbPlacesRestantes(): ?int
    {
        return $this->nb_places_restantes;
    }

    public function setNbPlacesRestantes(int $nb_places_restantes): self
    {
        $this->nb_places_restantes = $nb_places_restantes;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }
}
