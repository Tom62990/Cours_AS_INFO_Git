<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Entity\Client;
use Entity\Seance;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VenteRepository")
 */
class Vente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Seance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $seance;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_places_achetees;

    public function getId()
    {
        return $this->id;
    }

    public function getNbPlacesAchetees(): ?int
    {
        return $this->nb_places_achetees;
    }

    public function setNbPlacesAchetees(int $nb_places_achetees): self
    {
        $this->nb_places_achetees = $nb_places_achetees;

        return $this;
    }

    public function getSeance(): ?Seance
    {
        return $this->seance;
    }

    public function setSeance(?Seance $seance): self
    {
        $this->seance = $seance;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
