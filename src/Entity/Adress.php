<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\AdressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * * @ApiResource(normalizationContext={"groups"={"get"}},
 *     itemOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"get"}}
 *         },
 *         "put"={
 *             "normalization_context"={"groups"={"put"}}
 *         }
 *     }
 * )
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
     * @Groups("get")
     * 
     */
    private $numberStreet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get")
     * 
     */
    private $nameStreet;

    /**
     * @ORM\Column(type="string", length=5)
     * @Groups("get")
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("get")
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
