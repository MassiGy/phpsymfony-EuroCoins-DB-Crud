<?php

namespace App\Entity;

use App\Repository\P06PieceCaracteristiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=P06PieceCaracteristiqueRepository::class)
 */
class P06PieceCaracteristique
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $PieceFaceCommune;

    /**
     * @ORM\Column(type="integer")
     */
    private $PieceMasse;

    /**
     * @ORM\Column(type="integer")
     */
    private $PieceTaille;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $PieceMateriau;

    /**
     * @ORM\OneToMany(targetEntity=P06PieceModele::class, mappedBy="PieceCaracteristique")
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

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getPieceFaceCommune(): ?string
    {
        return $this->PieceFaceCommune;
    }

    public function setPieceFaceCommune(string $PieceFaceCommune): self
    {
        $this->PieceFaceCommune = $PieceFaceCommune;

        return $this;
    }

    public function getPieceMasse(): ?int
    {
        return $this->PieceMasse;
    }

    public function setPieceMasse(int $PieceMasse): self
    {
        $this->PieceMasse = $PieceMasse;

        return $this;
    }

    public function getPieceTaille(): ?int
    {
        return $this->PieceTaille;
    }

    public function setPieceTaille(int $PieceTaille): self
    {
        $this->PieceTaille = $PieceTaille;

        return $this;
    }

    public function getPieceMateriau(): ?string
    {
        return $this->PieceMateriau;
    }

    public function setPieceMateriau(string $PieceMateriau): self
    {
        $this->PieceMateriau = $PieceMateriau;

        return $this;
    }
    public function __toString()
    {
        return 
            "Face Commune: ".$this->PieceFaceCommune . ", " .
            "Masse: ". $this->PieceMasse . ", " .
            "Taille: ". $this->PieceTaille . ", " .
            "Materiau: ". $this->PieceMateriau;
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
            $pieceID->setPieceCaracteristique($this);
        }

        return $this;
    }

    public function removePieceID(P06PieceModele $pieceID): self
    {
        if ($this->PieceID->removeElement($pieceID)) {
            // set the owning side to null (unless already changed)
            if ($pieceID->getPieceCaracteristique() === $this) {
                $pieceID->setPieceCaracteristique(null);
            }
        }

        return $this;
    }
}
