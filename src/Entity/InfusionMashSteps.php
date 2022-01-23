<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InfusionMashStepsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfusionMashStepsRepository::class)
 */
#[ApiResource]
class InfusionMashSteps
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=MashVolume::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $massVolumeEstimation;

    /**
     * @ORM\ManyToOne(targetEntity=InitInfusion::class, inversedBy="relatedMashStep")
     * @ORM\JoinColumn(nullable=false)
     */
    private $initInfusion;

    /**
     * @ORM\ManyToMany(targetEntity=NextInfusionMashStepWithGrainAdjunct::class, inversedBy="relatedInfusionMashSteps")
     */
    private $mashStepWithAdjunct;

    /**
     * @ORM\ManyToMany(targetEntity=NextInfusionMashStepWithoutGrainAdjunct::class, inversedBy="relatedInfusionMashSteps")
     */
    private $mashStepsWithoutAdjunct;

    /**
     * @ORM\Column(type="float")
     */
    private $totalTime;

    public function __construct()
    {
        $this->mashStepWithAdjunct = new ArrayCollection();
        $this->mashStepsWithoutAdjunct = new ArrayCollection();
    }

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

    public function getMassVolumeEstimation(): ?MashVolume
    {
        return $this->massVolumeEstimation;
    }

    public function setMassVolumeEstimation(MashVolume $massVolumeEstimation): self
    {
        $this->massVolumeEstimation = $massVolumeEstimation;

        return $this;
    }

    public function getInitInfusion(): ?InitInfusion
    {
        return $this->initInfusion;
    }

    public function setInitInfusion(?InitInfusion $initInfusion): self
    {
        $this->initInfusion = $initInfusion;

        return $this;
    }

    /**
     * @return Collection|NextInfusionMashStepWithGrainAdjunct[]
     */
    public function getMashStepWithAdjunct(): Collection
    {
        return $this->mashStepWithAdjunct;
    }

    public function addMashStepWithAdjunct(NextInfusionMashStepWithGrainAdjunct $mashStepWithAdjunct): self
    {
        if (!$this->mashStepWithAdjunct->contains($mashStepWithAdjunct)) {
            $this->mashStepWithAdjunct[] = $mashStepWithAdjunct;
        }

        return $this;
    }

    public function removeMashStepWithAdjunct(NextInfusionMashStepWithGrainAdjunct $mashStepWithAdjunct): self
    {
        $this->mashStepWithAdjunct->removeElement($mashStepWithAdjunct);

        return $this;
    }

    /**
     * @return Collection|NextInfusionMashStepWithoutGrainAdjunct[]
     */
    public function getMashStepsWithoutAdjunct(): Collection
    {
        return $this->mashStepsWithoutAdjunct;
    }

    public function addMashStepsWithoutAdjunct(NextInfusionMashStepWithoutGrainAdjunct $mashStepsWithoutAdjunct): self
    {
        if (!$this->mashStepsWithoutAdjunct->contains($mashStepsWithoutAdjunct)) {
            $this->mashStepsWithoutAdjunct[] = $mashStepsWithoutAdjunct;
        }

        return $this;
    }

    public function removeMashStepsWithoutAdjunct(NextInfusionMashStepWithoutGrainAdjunct $mashStepsWithoutAdjunct): self
    {
        $this->mashStepsWithoutAdjunct->removeElement($mashStepsWithoutAdjunct);

        return $this;
    }

    public function getTotalTime(): ?float
    {
        return $this->totalTime;
    }

    public function setTotalTime(float $totalTime): self
    {
        $this->totalTime = $totalTime;

        return $this;
    }
}
