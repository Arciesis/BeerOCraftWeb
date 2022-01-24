<?php

namespace App\DataPersister;

use App\Entity\WaterGrainRatio;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;

class WaterGrainRatioDataPersister implements \ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    /**
     * @inheritDoc
     */
    public function supports($data, array $context = []): bool
    {
        if ($data instanceof WaterGrainRatio && $context['collection_operation_name'] === 'post'){
            return true;
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function persist($data, array $context = [])
    {
        // ratio = initVolume * 100 / initMassGrain

        $data->setInitWaterGrainRatio($data->getInitWaterVolume() * 1000 / $data->getInitMashDryGrain());
        $this->em->persist($data);
        $this->em->flush();
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function remove($data, array $context = [])
    {
    }
}
