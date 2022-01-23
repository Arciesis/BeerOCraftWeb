<?php

namespace App\Entity;

use App\Repository\NextDecoctionMashStepWithoutGrainAdjunctRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NextDecoctionMashStepWithoutGrainAdjunctRepository::class)
 */
class NextDecoctionMashStepWithoutGrainAdjunct
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
    private ?float $waterTempToadd;

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
    private ?float $decoctionVolumeToTake;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $time;

    /**
     * @ORM\ManyToMany(targetEntity=DecoctionMashSteps::class, mappedBy="mashStepWithoutGrainAdjunct")
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

    public function getWaterTempToadd(): ?float
    {
        return $this->waterTempToadd;
    }

    public function setWaterTempToadd(float $waterTempToadd): self
    {
        $this->waterTempToadd = $waterTempToadd;

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

    public function getDecoctionVolumeToTake(): ?float
    {
        return $this->decoctionVolumeToTake;
    }

    public function setDecoctionVolumeToTake(float $decoctionVolumeToTake): self
    {
        $this->decoctionVolumeToTake = $decoctionVolumeToTake;

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
            $relatedDecoctionMashStep->addMashStepWithoutGrainAdjunct($this);
        }

        return $this;
    }

    public function removeRelatedDecoctionMashStep(DecoctionMashSteps $relatedDecoctionMashStep): self
    {
        if ($this->relatedDecoctionMashSteps->removeElement($relatedDecoctionMashStep)) {
            $relatedDecoctionMashStep->removeMashStepWithoutGrainAdjunct($this);
        }

        return $this;
    }
}
