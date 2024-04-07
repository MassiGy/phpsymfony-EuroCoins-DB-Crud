<?php

namespace App\Entity;

use App\Repository\P06PieceCaracteristiqueRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\P06PieceModele;

/**
 * @ORM\Entity(repositoryClass=P06PieceCaracteristiqueRepository::class)
 */
class P06PieceCaracteristique
{
    //  * @Assert\NotBlank
    //  * @Assert\Positive
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank
     * 
     * @ORM\Column(type="string", length=250)
     */
    private $PieceFaceCommune;

    /**
     * @var int
     * @Assert\Type(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 0,
     *      max = 10000,     
     *      notInRangeMessage = "mass should be positive and should not exceed 10000 miligrames"
     * )
     * 
     * @ORM\Column(type="integer")
     */
    private $PieceMasse;

    /**
     * @var int
     * @Assert\Type(type="integer")
     * @Assert\NotBlank
     * @Assert\Positive
     * @Assert\Range(
     *      min=50,
     *      max=200,         
     *      notInRangeMessage="size should be greater then or equal to 50 and should not exceed 200 milimiters"
     * )
     * 
     * @ORM\Column(type="integer")
     */
    private $PieceTaille;

    /**
     * @var string 
     * @Assert\NotBlank
     * 
     * @ORM\Column(type="string", length=250)
     */
    private $PieceMateriau;

    /**
     * @var  Collection<int, P06PieceModele> 
     * 
     * @ORM\OneToMany(targetEntity=P06PieceModele::class, mappedBy="PieceCaracteristique", cascade={"remove"})
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
