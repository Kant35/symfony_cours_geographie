<?php

namespace App\Entity;

use App\Repository\ContinentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContinentRepository::class)
 */
class Continent
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
     * @ORM\OneToMany(targetEntity=Pays::class, mappedBy="continent", orphanRemoval=true)
     */
    private $pays;

    public function __construct()
    {
        $this->pays = new ArrayCollection();
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

    /**
     * @return Collection|Pays[]
     */
    public function getPays(): Collection
    {
        return $this->pays;
    }

    public function addPay(Pays $pay): self
    {
        if (!$this->pays->contains($pay)) {
            $this->pays[] = $pay;
            $pay->setContinent($this);
        }

        return $this;
    }

    public function removePay(Pays $pay): self
    {
        if ($this->pays->removeElement($pay)) {
            // set the owning side to null (unless already changed)
            if ($pay->getContinent() === $this) {
                $pay->setContinent(null);
            }
        }

        return $this;
    }
}
