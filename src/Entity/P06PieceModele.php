<?php

namespace App\Entity;

use App\Repository\P06PieceModeleRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=P06PieceModeleRepository::class)
 */
class P06PieceModele
{
    /**
     * @var int
     * @Assert\NotBlank
     * @Assert\Positive
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank
     * 
     * @ORM\Column(type="string", length=250)
     */
    private $PieceVersion;

    /**
     * @var int
     * @Assert\NotBlank
     * @Assert\Positive
     * 
     * @ORM\Column(type="integer")
     */
    private $PieceValeur;

    /**
     * @Assert\NotBlank
     * @todo: maybe add a range (when does this all started ?) 
     * 
     * @ORM\Column(type="date")
     */
    private $PieceDateFrappee;

    /**
     * @var int
     * @Assert\NotBlank
     * @Assert\Positive
     * @ORM\Column(type="bigint")
     */
    private $PieceQuantiteFrappee;

    /**
     * @ORM\ManyToOne(targetEntity=P06PiecePays::class, inversedBy="PiecesModelesProduits")
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

    /**
     * @todo: changer nom attribut, il contient la liste des collectionneurs ayant ce modele et pas les collections
     * attention, il faudra donc changer les template et les fichier de test aussi et les forumulaire (refaire make:crud)
     * 
     * @ORM\ManyToMany(targetEntity=P06Collectionneur::class, mappedBy="modelesCollectionnes")
     */
    private $collections;


    public function __construct()
    {
        $this->collections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
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

    public function __toString()
    {
        return 
            "Version: ".$this->PieceVersion . ", " .
            "Valeur: ". $this->PieceValeur . ", " .
            "Date Frappée: ". $this->PieceDateFrappee->format("d/m/Y") . ", " .
            "Quantité Frappée: ". $this->PieceQuantiteFrappee;
    }

    /**
     * @return Collection<int, P06Collectionneur>
     */
    public function getCollections(): Collection
    {
        return $this->collections;
    }

    public function addCollection(P06Collectionneur $collection): self
    {
        if (!$this->collections->contains($collection)) {
            $this->collections[] = $collection;
            $collection->addModeleCollectionne($this);
        }

        return $this;
    }

    public function removeCollection(P06Collectionneur $collection): self
    {
        if ($this->collections->removeElement($collection)) {
            $collection->removeModeleCollectionne($this);
        }

        return $this;
    }
}
