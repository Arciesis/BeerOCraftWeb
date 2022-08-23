<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NextInfusionMashStepWithGrainAdjunctRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    collectionOperations: [
        'post' => [
            'denormalization_context' => [
                'groups' => ['post:nextInfusionStepWithtGrainAdjunct']
            ]
        ]
    ],
    itemOperations: [
        'get'
    ]
)]
#[ORM\Entity(repositoryClass: NextInfusionMashStepWithGrainAdjunctRepository::class)]

class NextInfusionMashStepWithGrainAdjunct
{
    public const  WATER_HEAT_CAPACITY = 4200;
    public const GRAIN_HEAT_CAPACITY = 1714;
    public const CELSIUS_TO_KELVIN_ADJUNCT = 273.15;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: WaterGrainRatio::class, cascade: ['persist', 'remove'])]
    #[Groups('post:nextInfusionStepWithtGrainAdjunct')]
    private ?WaterGrainRatio $waterGrainRatioId;

    #[ORM\Column(type: 'float')]
    #[Groups('post:nextInfusionStepWithtGrainAdjunct')]
    private ?float $grainMassToAdd;

    #[ORM\Column(type: 'float')]
    #[Groups('post:nextInfusionStepWithtGrainAdjunct')]
    private ?float $tempOfGrainToAdd;

    #[ORM\Column(type: 'float')]
    #[Groups('post:nextInfusionStepWithtGrainAdjunct')]
    private ?float $wantedTempAtNextStep;

    #[ORM\Column(type: 'float')]
    #[Groups('post:nextInfusionStepWithtGrainAdjunct')]
    private ?float $waterTempToAdd;

    #[ORM\Column(type: 'float')]
    private ?float $waterVolumeToAdd;

    #[ORM\Column(type: 'float')]
    private ?float $newWaterGrainRatio;

    #[ORM\Column(type: 'float')]
    #[Groups('post:nextInfusionStepWithtGrainAdjunct')]
    private ?float $time;

    #[ORM\ManyToMany(targetEntity: InfusionMashSteps::class, mappedBy: 'mashStepWithAdjunct')]
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

    public function getWantedTempAtNextStep(): ?float
    {
        return $this->wantedTempAtNextStep;
    }

    public function setWantedTempAtNextStep(float $wantedTempAtNextStep): self
    {
        $this->wantedTempAtNextStep = $wantedTempAtNextStep;

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
