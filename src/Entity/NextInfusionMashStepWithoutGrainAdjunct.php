<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NextInfusionMashStepWithoutGrainAdjunctRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    collectionOperations: [
        'post',
    ],
    itemOperations: [
        'get'
    ]
)]
#[ORM\Entity(repositoryClass: NextInfusionMashStepWithoutGrainAdjunctRepository::class)]

class NextInfusionMashStepWithoutGrainAdjunct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[ApiProperty(identifier: true)]
    private ?int $id;

    /**
     *
     * // ManyToMany relation not sure it's correct though
     * // ORM\JoinTable(name="next_infusion_mash_step_without_grain_adjunct_water_grain_ratio",
     * //     joinColumns={@ORM\JoinColumn(name="next_infusion_mash_step_without_grain_adjunct_water_grain_ratio_id", referencedColumnName="id", nullable=false)},
     * //     inverseJoinColumns={@ORM\JoinColumn(name="water_grain_ratio_id", referencedColumnName="id", nullable=false)}
     * )
     */
    #[ORM\ManyToOne(targetEntity: WaterGrainRatio::class, cascade: ['persist', 'remove'])]
    #[Assert\NotNull]
    private ?WaterGrainRatio $waterGrainRatioId;

    #[ORM\Column(type: 'float')]
    #[Assert\NotNull]
    private float $waterAdjunctTemp;

    #[ORM\Column(type: 'float')]
    #[Assert\NotNull]
    private float $wantedTempAtNextStep;

    #[ORM\Column(type: 'float')]
    private float $waterVolumeToAdd;

    #[ORM\Column(type: 'float')]
    private float $newWaterGrainRatio;

    #[ORM\Column(type: 'float')]
    #[Assert\NotNull]
    private float $time;

    #[ORM\ManyToMany(targetEntity: InfusionMashSteps::class, mappedBy: 'mashStepsWithoutAdjunct')]
    private Collection $relatedInfusionMashSteps;

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

    public function getWaterAdjunctTemp(): ?float
    {
        return $this->waterAdjunctTemp;
    }

    public function setWaterAdjunctTemp(float $waterAdjunctTemp): self
    {
        $this->waterAdjunctTemp = $waterAdjunctTemp;

        return $this;
    }

    public function getWantedTempAtNextStep(): ?float
    {
        return $this->wantedTempAtNextStep;
    }

    public function setWantedTempAtNextStep(float $wantedTempAtNextStep): self
    {
        $this->wantedTempAtNextStep = $wantedTempAtNextStep;

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
            $relatedInfusionMashStep->addMashStepsWithoutAdjunct($this);
        }

        return $this;
    }

    public function removeRelatedInfusionMashStep(InfusionMashSteps $relatedInfusionMashStep): self
    {
        if ($this->relatedInfusionMashSteps->removeElement($relatedInfusionMashStep)) {
            $relatedInfusionMashStep->removeMashStepsWithoutAdjunct($this);
        }

        return $this;
    }
}
