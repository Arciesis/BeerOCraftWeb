<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MashVolumeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MashVolumeRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => [
                'groups' => ['get:collection:mashVolume']
            ]
        ],
        'post' => [
            'denormalization_context' => [
                'groups' => ['post:collection:mashVolume']
            ]
        ]
    ],
    itemOperations: [
        'get'
    ],
)]
class MashVolume
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     * @Groups("post:collection:mashVolume","get:collection:mashVolume")
     */
    private ?float $massGrainInMash;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     * @Groups("post:collection:mashVolume", "get:collection:mashVolume")
     */
    private ?float $waterGrainRatio;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $mashVolume;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMassGrainInMash(): ?float
    {
        return $this->massGrainInMash;
    }

    public function setMassGrainInMash(float $massGrainInMash): self
    {
        $this->massGrainInMash = $massGrainInMash;

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

    public function getMashVolume(): ?float
    {
        return $this->mashVolume;
    }

    public function setMashVolume(float $mashVolume): self
    {
        $this->mashVolume = $mashVolume;

        return $this;
    }
}
