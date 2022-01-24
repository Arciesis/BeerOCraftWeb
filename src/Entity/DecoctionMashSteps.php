<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DecoctionMashStepsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DecoctionMashStepsRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'post'
    ],
    itemOperations: [

    ]
)]
class DecoctionMashSteps
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\OneToOne(targetEntity=MashVolume::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private ?MashVolume $mashVolumeEstimation;

    /**
     * @ORM\ManyToOne(targetEntity=InitInfusion::class, inversedBy="relatedDecoctionMashSteps")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?InitInfusion $initInfusion;

    /**
     * @ORM\ManyToMany(targetEntity=NextDecoctionMashStepWithGrainAdjunct::class, inversedBy="relatedDecoctionMashSteps")
     */
    private ?ArrayCollection $mashStepWithAdjunct;

    /**
     * @ORM\ManyToMany(targetEntity=NextDecoctionMashStepWithoutGrainAdjunct::class, inversedBy="relatedDecoctionMashSteps")
     * @ORM\JoinTable(name="decoction_mash_steps_next_decoction_mash_step_wo_grain_adjunct")
     */
    private ?ArrayCollection $mashStepWithoutGrainAdjunct;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $totalTime;

    public function __construct()
    {
        $this->mashStepWithAdjunct = new ArrayCollection();
        $this->mashStepWithoutGrainAdjunct = new ArrayCollection();
    }

    public function getId(): ?float
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

    public function getMashVolumeEstimation(): ?MashVolume
    {
        return $this->mashVolumeEstimation;
    }

    public function setMashVolumeEstimation(MashVolume $mashVolumeEstimation): self
    {
        $this->mashVolumeEstimation = $mashVolumeEstimation;

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
     * @return Collection|NextDecoctionMashStepWithGrainAdjunct[]
     */
    public function getMashStepWithAdjunct(): Collection
    {
        return $this->mashStepWithAdjunct;
    }

    public function addMashStepWithAdjunct(NextDecoctionMashStepWithGrainAdjunct $mashStepWithAdjunct): self
    {
        if (!$this->mashStepWithAdjunct->contains($mashStepWithAdjunct)) {
            $this->mashStepWithAdjunct[] = $mashStepWithAdjunct;
        }

        return $this;
    }

    public function removeMashStepWithAdjunct(NextDecoctionMashStepWithGrainAdjunct $mashStepWithAdjunct): self
    {
        $this->mashStepWithAdjunct->removeElement($mashStepWithAdjunct);

        return $this;
    }

    /**
     * @return Collection|NextDecoctionMashStepWithoutGrainAdjunct[]
     */
    public function getMashStepWithoutGrainAdjunct(): Collection
    {
        return $this->mashStepWithoutGrainAdjunct;
    }

    public function addMashStepWithoutGrainAdjunct(NextDecoctionMashStepWithoutGrainAdjunct $mashStepWithoutGrainAdjunct): self
    {
        if (!$this->mashStepWithoutGrainAdjunct->contains($mashStepWithoutGrainAdjunct)) {
            $this->mashStepWithoutGrainAdjunct[] = $mashStepWithoutGrainAdjunct;
        }

        return $this;
    }

    public function removeMashStepWithoutGrainAdjunct(NextDecoctionMashStepWithoutGrainAdjunct $mashStepWithoutGrainAdjunct): self
    {
        $this->mashStepWithoutGrainAdjunct->removeElement($mashStepWithoutGrainAdjunct);

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
