<?php

namespace App\Entity;

use App\Repository\InitInfusionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InitInfusionRepository::class)
 */
class InitInfusion
{
   /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   * @Assert\NotBlank()
   */
    private ?int $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private ?float $initGrainTemp;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private ?float $wantedMashTemp;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private ?float $waterGrainRatio;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $waterTempToAdjunct;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private ?float $time;

    /**
     * @ORM\OneToMany(targetEntity=InfusionMashSteps::class, mappedBy="initInfusion", orphanRemoval=true)
     */
    private ArrayCollection $relatedMashStep;

    /**
     * @ORM\OneToMany(targetEntity=DecoctionMashSteps::class, mappedBy="initInfusion")
     */
    private ArrayCollection $relatedDecoctionMashSteps;

    public function __construct()
    {
        $this->relatedMashStep = new ArrayCollection();
        $this->relatedDecoctionMashSteps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInitGrainTemp(): ?float
    {
        return $this->initGrainTemp;
    }

    public function setInitGrainTemp(float $initGrainTemp): self
    {
        $this->initGrainTemp = $initGrainTemp;

        return $this;
    }

    public function getWantedMashTemp(): ?float
    {
        return $this->wantedMashTemp;
    }

    public function setWantedMashTemp(float $wantedMashTemp): self
    {
        $this->wantedMashTemp = $wantedMashTemp;

        return $this;
    }

    public function getWaterGrainRatio(): ?float
    {
        return $this->waterGrainRatio;
    }

    public function setWaterGrainRatio(float $waterGrainRatio): self
    {
        $this->waterGrainRatio = $waterGrainRatio;

        return $this;
    }

    public function getWaterTempToAdjunct(): ?float
    {
        return $this->waterTempToAdjunct;
    }

    public function setWaterTempToAdjunct(float $waterTempToAdjunct): self
    {
        $this->waterTempToAdjunct = $waterTempToAdjunct;

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
    public function getRelatedMashStep(): Collection
    {
        return $this->relatedMashStep;
    }

    public function addRelatedMashStep(InfusionMashSteps $relatedMashStep): self
    {
        if (!$this->relatedMashStep->contains($relatedMashStep)) {
            $this->relatedMashStep[] = $relatedMashStep;
            $relatedMashStep->setInitInfusion($this);
        }

        return $this;
    }

    public function removeRelatedMashStep(InfusionMashSteps $relatedMashStep): self
    {
        if ($this->relatedMashStep->removeElement($relatedMashStep)) {
            // set the owning side to null (unless already changed)
            if ($relatedMashStep->getInitInfusion() === $this) {
                $relatedMashStep->setInitInfusion(null);
            }
        }

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
            $relatedDecoctionMashStep->setInitInfusion($this);
        }

        return $this;
    }

    public function removeRelatedDecoctionMashStep(DecoctionMashSteps $relatedDecoctionMashStep): self
    {
        if ($this->relatedDecoctionMashSteps->removeElement($relatedDecoctionMashStep)) {
            // set the owning side to null (unless already changed)
            if ($relatedDecoctionMashStep->getInitInfusion() === $this) {
                $relatedDecoctionMashStep->setInitInfusion(null);
            }
        }

        return $this;
    }
}
