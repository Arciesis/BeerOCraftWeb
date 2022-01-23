<?php

namespace App\Entity;
use App\Repository\WaterGrainRatioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=WaterGrainRatioRepository::class)
 */
class WaterGrainRatio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $initMashTemp;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $initMashDryGrain;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $initWaterVolume;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $initWaterGrainRatio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInitMashTemp(): ?float
    {
        return $this->initMashTemp;
    }

    public function setInitMashTemp(float $initMashTemp): self
    {
        $this->initMashTemp = $initMashTemp;

        return $this;
    }

    public function getInitMashDryGrain(): ?float
    {
        return $this->initMashDryGrain;
    }

    public function setInitMashDryGrain(float $initMashDryGrain): self
    {
        $this->initMashDryGrain = $initMashDryGrain;

        return $this;
    }

    public function getInitWaterVolume(): ?float
    {
        return $this->initWaterVolume;
    }

    public function setInitWaterVolume(float $initWaterVolume): self
    {
        $this->initWaterVolume = $initWaterVolume;

        return $this;
    }

    public function getInitWaterGrainRatio(): ?float
    {
        return $this->initWaterGrainRatio;
    }

    public function setInitWaterGrainRatio(float $initWaterGrainRatio): self
    {
        $this->initWaterGrainRatio = $initWaterGrainRatio;

        return $this;
    }
}
