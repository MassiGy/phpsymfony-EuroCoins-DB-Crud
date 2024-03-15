<?php

namespace App\Entity;

use App\Repository\P06CollectionneurRepository;
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
    private $CollectionneurID;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $CollectionneurNom;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $CollectionneurPrenom;

    public function getId(): ?int
    {
        return $this->CollectionneurID;
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
}
