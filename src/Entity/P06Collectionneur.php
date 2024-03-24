<?php

namespace App\Entity;

use App\Repository\P06CollectionneurRepository;
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
    public function getModelesCollectionnes(): Collection
    {
        return $this->modelesCollectionnes;
    }

    public function addModeleCollectionne(P06PieceModele $modele): self
    {
        if (!$this->modelesCollectionnes->contains($modele)) {
            $this->modelesCollectionnes[] = $modele;
        }

        return $this;
    }

    public function removeModeleCollectionne(P06PieceModele $modele): self
    {
        $this->modelesCollectionnes->removeElement($modele);

        return $this;
    }
}
