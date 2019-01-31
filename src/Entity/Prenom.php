<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrenomRepository")
 * @ORM\Table(name="prenoms")
 */
class Prenom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    
    private $genre;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNom(): ?int
    {
        return $this->nom;
    }

    public function setNom(int $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnneee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

}
