<?php

namespace App\Entity;

use App\Repository\P06PiecePaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=P06PiecePaysRepository::class)
 */
class P06PiecePays
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $PaysNom;

    /**
     * @ORM\OneToMany(targetEntity=P06PieceModele::class, mappedBy="PiecePays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PiecesModelesProduits;

    public function __construct()
    {
        $this->PiecesModelesProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaysNom(): ?string
    {
        return $this->PaysNom;
    }

    public function setPaysNom(string $PaysNom): self
    {
        $this->PaysNom = $PaysNom;

        return $this;
    }

    /**
     * @return Collection<int, P06PieceModele>
     */
    public function getPiecesModelesProduits(): Collection
    {
        return $this->PiecesModelesProduits;
    }

    public function addPieceModeleProduit(P06PieceModele $modele): self
    {
        if (!$this->PiecesModelesProduits->contains($modele)) {
            $this->PiecesModelesProduits[] = $modele;
            $modele->setPiecePays($this);
        }

        return $this;
    }

    public function removePieceModeleProduit(P06PieceModele $modele): self
    {
        if ($this->PiecesModelesProduits->removeElement($modele)) {
            // set the owning side to null (unless already changed)
            if ($modele->getPiecePays() === $this) {
                $modele->setPiecePays(null);
            }
        }

        return $this;
    }
}
