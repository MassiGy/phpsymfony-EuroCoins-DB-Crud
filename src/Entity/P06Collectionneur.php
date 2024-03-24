<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=P06CollectionneurRepository::class)
 */
class P06Collectionneur
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $CollectionneurNom;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $CollectionneurPrenom;

    /**
     * @ORM\ManyToMany(targetEntity=P06PieceModele::class, inversedBy="collections")
     */
    private $modelesCollectionnes;

    public function __construct()
    {
        $this->modelesCollectionnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCollectionneurNom(): ?string
    {
        return $this->CollectionneurNom;
    }

    public function setCollectionneurNom(string $CollectionneurNom): self
    {
        $this->CollectionneurNom = $CollectionneurNom;

        return $this;
    }

    public function getCollectionneurPrenom(): ?string
    {
        return $this->CollectionneurPrenom;
    }

    public function setCollectionneurPrenom(string $CollectionneurPrenom): self
    {
        $this->CollectionneurPrenom = $CollectionneurPrenom;

        return $this;
    }

    /**
     * @return Collection<int, P06PieceModele>
     */
    public function getCollectionnements(): Collection
    {
        return $this->collectionnements;
    }

    public function addCollectionnement(P06PieceModele $collectionnement): self
    {
        if (!$this->collectionnements->contains($collectionnement)) {
            $this->collectionnements[] = $collectionnement;
        }

        return $this;
    }

    public function removeCollectionnement(P06PieceModele $collectionnement): self
    {
        $this->collectionnements->removeElement($collectionnement);

        return $this;
    }
}
