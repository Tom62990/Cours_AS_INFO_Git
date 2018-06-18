<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Entity\Utilisateur;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_achats;

    /**
     * @ORM\Column(type="date")
     */
    private $date_inscription;

    public function getId()
    {
        return $this->id;
    }

    public function getNbAchats(): ?int
    {
        return $this->nb_achats;
    }

    public function setNbAchats(int $nb_achats): self
    {
        $this->nb_achats = $nb_achats;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
