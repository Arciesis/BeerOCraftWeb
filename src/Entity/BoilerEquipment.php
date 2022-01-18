<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BoilerEquipmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=BoilerEquipmentRepository::class)
 *
 * @ApiResource(
 * )
 */
class BoilerEquipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @ApiProperty(identifier=false)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @ApiProperty(identifier=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $preBoilVolume;

    /**
     * @ORM\Column(type="integer")
     */
    private $batchSize;

    /**
     * @ORM\Column(type="smallint")
     */
    private $boilTime;

    /**
     * @ORM\Column(type="smallint")
     */
    private $evaporationRatePercentage;

    /**
     * @ORM\Column(type="float")
     */
    private $grainAbsorption;

    /**
     *
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="boilerEquipment")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private User $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPreBoilVolume(): ?int
    {
        return $this->preBoilVolume;
    }

    public function setPreBoilVolume(int $preBoilVolume): self
    {
        if ($preBoilVolume > 0) {
            $this->preBoilVolume = $preBoilVolume;
        } else {
            throw new \InvalidArgumentException('negative or null pre boil volume');
        }

        return $this;
    }

    public function getBatchSize(): ?int
    {
        return $this->batchSize;
    }

    public function setBatchSize(int $batchSize): self
    {
        if ($batchSize > 0) {
            $this->batchSize = $batchSize;
        } else {
            throw new \InvalidArgumentException('negative or null batch size');
        }

        return $this;
    }

    public function getBoilTime(): ?int
    {
        return $this->boilTime;
    }

    public function setBoilTime(int $boilTime): self
    {
        if ($boilTime > 0) {
            $this->boilTime = $boilTime;
        } else {
            throw new \InvalidArgumentException('negative boil time');
        }

        return $this;
    }

    public function getEvaporationRatePercentage(): ?int
    {
        return $this->evaporationRatePercentage;
    }

    public function setEvaporationRatePercentage(int $evaporationRatePercentage): self
    {
        if ($evaporationRatePercentage > 0 || $evaporationRatePercentage < 100) {
            $this->evaporationRatePercentage = $evaporationRatePercentage;
        } else throw new \InvalidArgumentException('evaporation rate isn\'t in percent');

        return $this;
    }

    public function getGrainAbsorption(): ?float
    {
        return $this->grainAbsorption;
    }

    public function setGrainAbsorption(float $grainAbsorption): self
    {
        if ($grainAbsorption > 0) {
            $this->grainAbsorption = $grainAbsorption;
        } else throw new \InvalidArgumentException('negative or null grain absorption');

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
