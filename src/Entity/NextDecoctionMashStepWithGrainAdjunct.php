<?php

namespace App\Entity;

use App\Repository\NextDecoctionMashStepWithGrainAdjunctRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NextDecoctionMashStepWithGrainAdjunctRepository::class)
 */
class NextDecoctionMashStepWithGrainAdjunct
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
    private ?WaterGrainRatio $waterGrainRatio;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $wantedTempNextStep;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $decoctionWaterGrainRatio;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $waterTempToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $decoctionBoilTime;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $evaporationRate;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $grainMassToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $grainTempToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $waterVolumeToAdd;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $waterBoilTime;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $decoctionVolumeToTake;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $newWaterGrainRatio;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $time;

    /**
     * @ORM\ManyToMany(targetEntity=DecoctionMashSteps::class, mappedBy="mashStepWithAdjunct")
     */
    private ArrayCollection $relatedDecoctionMashSteps;

    public function __construct()
    {
        $this->relatedDecoctionMashSteps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWaterGrainRatio(): ?WaterGrainRatio
    {
        return $this->waterGrainRatio;
    }

    public function setWaterGrainRatio(WaterGrainRatio $waterGrainRatio): self
    {
        $this->waterGrainRatio = $waterGrainRatio;

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

    public function getDecoctionWaterGrainRatio(): ?float
    {
        return $this->decoctionWaterGrainRatio;
    }

    public function setDecoctionWaterGrainRatio(float $decoctionWaterGrainRatio): self
    {
        $this->decoctionWaterGrainRatio = $decoctionWaterGrainRatio;

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

    public function getDecoctionBoilTime(): ?float
    {
        return $this->decoctionBoilTime;
    }

    public function setDecoctionBoilTime(float $decoctionBoilTime): self
    {
        $this->decoctionBoilTime = $decoctionBoilTime;

        return $this;
    }

    public function getEvaporationRate(): ?float
    {
        return $this->evaporationRate;
    }

    public function setEvaporationRate(float $evaporationRate): self
    {
        $this->evaporationRate = $evaporationRate;

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

    public function getGrainTempToAdd(): ?float
    {
        return $this->grainTempToAdd;
    }

    public function setGrainTempToAdd(float $grainTempToAdd): self
    {
        $this->grainTempToAdd = $grainTempToAdd;

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

    public function getWaterBoilTime(): ?float
    {
        return $this->waterBoilTime;
    }

    public function setWaterBoilTime(float $waterBoilTime): self
    {
        $this->waterBoilTime = $waterBoilTime;

        return $this;
    }

    public function getDecoctionVolumeToTake(): ?float
    {
        return $this->decoctionVolumeToTake;
    }

    public function setDecoctionVolumeToTake(float $decoctionVolumeToTake): self
    {
        $this->decoctionVolumeToTake = $decoctionVolumeToTake;

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
     * @return Collection|DecoctionMashSteps[]
     */
    public function getRelatedDecoctionMashSteps(): Collection
    {
        return $this->relatedDecoctionMashSteps;
    }

    public function addRelatedDecoctionMashStep(DecoctionMashSteps $relatedDecoctionMashStep): self
    {
        if (!$this->relatedDecoctionMashSteps->contains($relatedDecoctionMashStep)) {
            $this->relatedDecoctionMashSteps[] = $relatedDecoctionMashStep;
            $relatedDecoctionMashStep->addMashStepWithAdjunct($this);
        }

        return $this;
    }

    public function removeRelatedDecoctionMashStep(DecoctionMashSteps $relatedDecoctionMashStep): self
    {
        if ($this->relatedDecoctionMashSteps->removeElement($relatedDecoctionMashStep)) {
            $relatedDecoctionMashStep->removeMashStepWithAdjunct($this);
        }

        return $this;
    }
}
