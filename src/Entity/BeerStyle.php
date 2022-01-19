<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Exception\InvalidArgumentException;
use App\Repository\BeerStyleRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=BeerStyleRepository::class)
 * @ApiResource(
 *     collectionOperations={
 *     "get",
 *     },
 *     itemOperations={
 *      "get",
 *      "patch"={"security"="is_granted('ROLE_ADMIN', object)"},
 *     }
 * )
 */
class BeerStyle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     * @ApiProperty(identifier=false)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @ApiProperty(identifier=true)
     * @Gedmo\Slug(fields={"name"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bjcpCategory;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ibuMin;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ibuMax;

    /**
     * @ORM\Column(type="smallint")
     */
    private $abvMin;

    /**
     * @ORM\Column(type="smallint")
     */
    private $abvMax;

    /**
     * @ORM\Column(type="float")
     */
    private $ogMin;

    /**
     * @ORM\Column(type="float")
     */
    private $ogMax;

    /**
     * @ORM\Column(type="float")
     */
    private $fgMin;

    /**
     * @ORM\Column(type="float")
     */
    private $fgMax;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gazVolumeMin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $gazVolumeMax;

    /**
     * @ORM\Column(type="smallint")
     */
    private $lovibond;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getBjcpCategory(): ?string
    {
        return $this->bjcpCategory;
    }

    public function setBjcpCategory(string $bjcpCategory): self
    {
        $this->bjcpCategory = $bjcpCategory;

        return $this;
    }

    public function getIbuMin(): ?int
    {
        return $this->ibuMin;
    }

    public function setIbuMin(int $ibuMin): self
    {
        if ($ibuMin >= 0) {
            $this->ibuMin = $ibuMin;
        } else throw new InvalidArgumentException('Bitterness Min is negative');

        return $this;
    }

    public function getIbuMax(): ?int
    {
        return $this->ibuMax;
    }

    public function setIbuMax(int $ibuMax): self
    {
        if ($ibuMax >= 0) {
            $this->ibuMax = $ibuMax;
        } else throw new InvalidArgumentException('Bitterness Max is negative');

        return $this;
    }

    public function getAbvMin(): ?int
    {
        return $this->abvMin;
    }

    public function setAbvMin(int $abvMin): self
    {
        if ($abvMin >= 0) {
            $this->abvMin = $abvMin;
        } else throw new InvalidArgumentException('abv Min is negative');

        return $this;
    }

    public function getAbvMax(): ?int
    {
        return $this->abvMax;
    }

    public function setAbvMax(int $abvMax): self
    {
        if ($abvMax >= 0) {
            $this->abvMax = $abvMax;
        } else throw new InvalidArgumentException('abv Max is negative');

        return $this;
    }

    public function getOgMin(): ?float
    {
        return $this->ogMin;
    }

    public function setOgMin(float $ogMin): self
    {
        if ($ogMin >= 1.0 && $ogMin < 1.2) {
            $this->ogMin = $ogMin;
        } else throw new InvalidArgumentException('OG min isn\'t between valid interval');

        return $this;
    }

    public function getOgMax(): ?float
    {
        return $this->ogMax;
    }

    public function setOgMax(float $ogMax): self
    {
        if ($ogMax >= 1 && $ogMax <= 1.2) {
            $this->ogMax = $ogMax;
        } else throw new InvalidArgumentException('OG max isn\'t between valid interval');

        return $this;
    }

    public function getFgMin(): ?float
    {
        return $this->fgMin;
    }

    public function setFgMin(float $fgMin): self
    {
        if ($fgMin >= 1 && $fgMin <= 1.2) {
            $this->fgMin = $fgMin;
        } else throw new InvalidArgumentException('FG min isn\'t between valid interval');

        return $this;
    }

    public function getFgMax(): ?float
    {
        return $this->fgMax;
    }

    public function setFgMax(float $fgMax): self
    {
        if ($fgMax >= 1 && $fgMax <= 1.2) {
            $this->fgMax = $fgMax;
        } else throw new InvalidArgumentException('FG max isn\'t between valid interval');

        return $this;
    }

    public function getGazVolumeMin(): ?float
    {
        return $this->gazVolumeMin;
    }

    public function setGazVolumeMin(?float $gazVolumeMin): self
    {
        if ($gazVolumeMin >= 0) {
            $this->gazVolumeMin = $gazVolumeMin;
        } else throw new InvalidArgumentException('CO2 volume Min is negative');

        return $this;
    }

    public function getGazVolumeMax(): ?float
    {
        return $this->gazVolumeMax;
    }

    public function setGazVolumeMax(?float $gazVolumeMax): self
    {
        if ($gazVolumeMax >= 0) {
            $this->gazVolumeMax = $gazVolumeMax;
        }else throw new InvalidArgumentException('CO2 volume negative');

        return $this;
    }

    public function getLovibond(): ?int
    {
        return $this->lovibond;
    }

    public function setLovibond(int $lovibond): self
    {
        if ($lovibond >= 0) {
            $this->lovibond = $lovibond;
        } else throw new InvalidArgumentException('Lovibond is lesser that zero');

        return $this;
    }
}
