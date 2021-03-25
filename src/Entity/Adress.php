<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AdressRepository::class)
 */
class Adress
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * 
     */
    private $numberStreet;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $nameStreet;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $town;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberStreet(): ?int
    {
        return $this->numberStreet;
    }

    public function setNumberStreet(int $numberStreet): self
    {
        $this->numberStreet = $numberStreet;

        return $this;
    }

    public function getNameStreet(): ?string
    {
        return $this->nameStreet;
    }

    public function setNameStreet(string $nameStreet): self
    {
        $this->nameStreet = $nameStreet;

        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }
}
