<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FuelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FuelRepository::class)
 */
class Fuel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fuelName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuelName(): ?string
    {
        return $this->fuelName;
    }

    public function setFuelName(string $fuelName): self
    {
        $this->fuelName = $fuelName;

        return $this;
    }
}
