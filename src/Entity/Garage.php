<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\GarageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"get"}},
 *     itemOperations={
 *         "get"={
 *             "normalization_context"={"groups"={"get"}}
 *         },
 *         "put"={
 *             "normalization_context"={"groups"={"put"}}
 *         }
 *     }
 * )
 * 
 * @ORM\Entity(repositoryClass=GarageRepository::class)
 */
class Garage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("get") 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups("get")
     */
    private $numberTel;

    /**
     * @ORM\OneToOne(targetEntity=Adress::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups("get")
     */
    private $adress;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("get")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("get")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberTel(): ?string
    {
        return $this->numberTel;
    }

    public function setNumberTel(string $numberTel): self
    {
        $this->numberTel = $numberTel;

        return $this;
    }

    public function getAdress(): ?Adress
    {
        return $this->adress;
    }

    public function setAdress(Adress $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
