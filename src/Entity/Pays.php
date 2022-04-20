<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Continent::class, inversedBy="pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $continent;

    /**
     * @ORM\OneToOne(targetEntity=Capitale::class, inversedBy="pays", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $capitale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getContinent(): ?Continent
    {
        return $this->continent;
    }

    public function setContinent(?Continent $continent): self
    {
        $this->continent = $continent;

        return $this;
    }

    public function getCapitale(): ?Capitale
    {
        return $this->capitale;
    }

    public function setCapitale(Capitale $capitale): self
    {
        $this->capitale = $capitale;

        return $this;
    }
}
