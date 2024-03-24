<?php

namespace App\Entity;

use App\Repository\P06PieceTrancheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=P06PieceTrancheRepository::class)
 */
class P06PieceTranche
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $PieceTranche;

    /**
     * @ORM\OneToMany(targetEntity=P06PieceModele::class, mappedBy="PieceTranche")
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

    public function getPieceTranche(): ?string
    {
        return $this->PieceTranche;
    }

    public function setPieceTranche(string $PieceTranche): self
    {
        $this->PieceTranche = $PieceTranche;

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
            $pieceID->setPieceTranche($this);
        }

        return $this;
    }

    public function removePieceID(P06PieceModele $pieceID): self
    {
        if ($this->PieceID->removeElement($pieceID)) {
            // set the owning side to null (unless already changed)
            if ($pieceID->getPieceTranche() === $this) {
                $pieceID->setPieceTranche(null);
            }
        }

        return $this;
    }
}
