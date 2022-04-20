<?php

namespace App\Entity;

use App\Repository\CapitaleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CapitaleRepository::class)
 */
class Capitale
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
     * @ORM\OneToOne(targetEntity=Pays::class, mappedBy="capitale", cascade={"persist", "remove"})
     */
    private $pays;

    public function __toString()
    {
        return $this->getNom();
    }

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

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(Pays $pays): self
    {
        // set the owning side of the relation if necessary
        if ($pays->getCapitale() !== $this) {
            $pays->setCapitale($this);
        }

        $this->pays = $pays;

        return $this;
    }
}
