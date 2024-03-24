<?php

namespace App\Entity;

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
     * @ORM\OneToMany(targetEntity=P06PieceModele::class, mappedBy="PaysID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PieceID;

    public function __construct()
    {
        $this->PieceID = new ArrayCollection();
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
    public function getPieceID(): Collection
    {
        return $this->PieceID;
    }

    public function addPieceID(P06PieceModele $pieceID): self
    {
        if (!$this->PieceID->contains($pieceID)) {
            $this->PieceID[] = $pieceID;
            $pieceID->setPiecePays($this);
        }

        return $this;
    }

    public function removePieceID(P06PieceModele $pieceID): self
    {
        if ($this->PieceID->removeElement($pieceID)) {
            // set the owning side to null (unless already changed)
            if ($pieceID->getPiecePays() === $this) {
                $pieceID->setPiecePays(null);
            }
        }

        return $this;
    }
}
