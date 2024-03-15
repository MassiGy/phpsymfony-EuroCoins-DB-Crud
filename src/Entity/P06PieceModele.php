<?php

namespace App\Entity;

use App\Repository\P06PieceModeleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=P06PieceModeleRepository::class)
 */
class P06PieceModele
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $PieceID;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $PieceVersion;

    /**
     * @ORM\Column(type="integer")
     */
    private $PieceValeur;

    /**
     * @ORM\Column(type="date")
     */
    private $PieceDateFrappee;

    /**
     * @ORM\Column(type="bigint")
     */
    private $PieceQuantiteFrappee;

    /**
     * @ORM\ManyToOne(targetEntity=P06PiecePays::class, inversedBy="PieceID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PiecePays;

    /**
     * @ORM\ManyToOne(targetEntity=P06PieceTranche::class, inversedBy="PieceID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PieceTranche;

    /**
     * @ORM\ManyToOne(targetEntity=P06PieceCaracteristique::class, inversedBy="PieceID")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PieceCaracteristique;

    public function getId(): ?int
    {
        return $this->PieceID;
    }

    public function getPieceVersion(): ?string
    {
        return $this->PieceVersion;
    }

    public function setPieceVersion(string $PieceVersion): self
    {
        $this->PieceVersion = $PieceVersion;

        return $this;
    }

    public function getPieceValeur(): ?int
    {
        return $this->PieceValeur;
    }

    public function setPieceValeur(int $PieceValeur): self
    {
        $this->PieceValeur = $PieceValeur;

        return $this;
    }

    public function getPieceDateFrappee(): ?\DateTimeInterface
    {
        return $this->PieceDateFrappee;
    }

    public function setPieceDateFrappee(\DateTimeInterface $PieceDateFrappee): self
    {
        $this->PieceDateFrappee = $PieceDateFrappee;

        return $this;
    }

    public function getPieceQuantiteFrappee(): ?string
    {
        return $this->PieceQuantiteFrappee;
    }

    public function setPieceQuantiteFrappee(string $PieceQuantiteFrappee): self
    {
        $this->PieceQuantiteFrappee = $PieceQuantiteFrappee;

        return $this;
    }

    public function getPiecePays(): ?P06PiecePays
    {
        return $this->PiecePays;
    }

    public function setPiecePays(?P06PiecePays $PiecePays): self
    {
        $this->PiecePays = $PiecePays;

        return $this;
    }

    public function getPieceTranche(): ?P06PieceTranche
    {
        return $this->PieceTranche;
    }

    public function setPieceTranche(?P06PieceTranche $PieceTranche): self
    {
        $this->PieceTranche = $PieceTranche;

        return $this;
    }

    public function getPieceCaracteristique(): ?P06PieceCaracteristique
    {
        return $this->PieceCaracteristique;
    }

    public function setPieceCaracteristique(?P06PieceCaracteristique $PieceCaracteristique): self
    {
        $this->PieceCaracteristique = $PieceCaracteristique;

        return $this;
    }
}
