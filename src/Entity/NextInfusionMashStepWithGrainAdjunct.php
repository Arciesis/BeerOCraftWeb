<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NextInfusionMashStepWithGrainAdjunctRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NextInfusionMashStepWithGrainAdjunctRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post'
    ],
    itemOperations: [

    ]
)]
class NextInfusionMashStepWithGrainAdjunct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\OneToOne(targetEntity=WaterGrainRatio::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private ?WaterGrainRatio $waterGrainRatioId;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $grainMassToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $tempOfGrainToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $wantedTempNextStep;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $waterTempToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $waterVolumeToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $newWaterGrainRatio;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $time;

    /**
     * @ORM\ManyToMany(targetEntity=InfusionMashSteps::class, mappedBy="mashStepWithAdjunct")
     */
    private $relatedInfusionMashSteps;

    public function __construct()
    {
        $this->relatedInfusionMashSteps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWaterGrainRatioId(): ?WaterGrainRatio
    {
        return $this->waterGrainRatioId;
    }

    public function setWaterGrainRatioId(WaterGrainRatio $waterGrainRatioId): self
    {
        $this->waterGrainRatioId = $waterGrainRatioId;

        return $this;
    }

    public function getGrainMassToAdd(): ?float
    {
        return $this->grainMassToAdd;
    }

    public function setGrainMassToAdd(float $grainMassToAdd): self
    {
        $this->grainMassToAdd = $grainMassToAdd;

        return $this;
    }

    public function getTempOfGrainToAdd(): ?float
    {
        return $this->tempOfGrainToAdd;
    }

    public function setTempOfGrainToAdd(float $tempOfGrainToAdd): self
    {
        $this->tempOfGrainToAdd = $tempOfGrainToAdd;

        return $this;
    }

    public function getWantedTempNextStep(): ?float
    {
        return $this->wantedTempNextStep;
    }

    public function setWantedTempNextStep(float $wantedTempNextStep): self
    {
        $this->wantedTempNextStep = $wantedTempNextStep;

        return $this;
    }

    public function getWaterTempToAdd(): ?float
    {
        return $this->waterTempToAdd;
    }

    public function setWaterTempToAdd(float $waterTempToAdd): self
    {
        $this->waterTempToAdd = $waterTempToAdd;

        return $this;
    }

    public function getWaterVolumeToAdd(): ?float
    {
        return $this->waterVolumeToAdd;
    }

    public function setWaterVolumeToAdd(float $waterVolumeToAdd): self
    {
        $this->waterVolumeToAdd = $waterVolumeToAdd;

        return $this;
    }

    public function getNewWaterGrainRatio(): ?float
    {
        return $this->newWaterGrainRatio;
    }

    public function setNewWaterGrainRatio(float $newWaterGrainRatio): self
    {
        $this->newWaterGrainRatio = $newWaterGrainRatio;

        return $this;
    }

    public function getTime(): ?float
    {
        return $this->time;
    }

    public function setTime(float $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Collection|InfusionMashSteps[]
     */
    public function getRelatedInfusionMashSteps(): Collection
    {
        return $this->relatedInfusionMashSteps;
    }

    public function addRelatedInfusionMashStep(InfusionMashSteps $relatedInfusionMashStep): self
    {
        if (!$this->relatedInfusionMashSteps->contains($relatedInfusionMashStep)) {
            $this->relatedInfusionMashSteps[] = $relatedInfusionMashStep;
            $relatedInfusionMashStep->addMashStepWithAdjunct($this);
        }

        return $this;
    }

    public function removeRelatedInfusionMashStep(InfusionMashSteps $relatedInfusionMashStep): self
    {
        if ($this->relatedInfusionMashSteps->removeElement($relatedInfusionMashStep)) {
            $relatedInfusionMashStep->removeMashStepWithAdjunct($this);
        }

        return $this;
    }
}
