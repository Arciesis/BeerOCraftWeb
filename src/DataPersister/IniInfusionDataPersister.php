<?php

namespace App\DataPersister;

use ApiPlatform\Core\Bridge\Doctrine\Common\DataPersister;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\InitInfusion;

class IniInfusionDataPersister implements ContextAwareDataPersisterInterface
{

    public function __construct(private DataPersisterInterface $decoratedDataPersister)
    {
    }

    /**
     * @inheritDoc
     */
    public function supports($data, array $context = []): bool
    {
        // dd($context);
        if ($data instanceof InitInfusion && $context['collection_operation_name'] === 'post') {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function persist($data, array $context = [])
    {
        // G15 = (0,41/G14)*(G13-G12)+G13
        $data->setWaterTempToAdjunct(
            (0.41 / $data->getWaterGrainRatio()) * ($data->getWantedMashTemp() - $data->getInitGrainTemp(
                )) + $data->getWantedMashTemp()
        );

       $this->decoratedDataPersister->persist($data);

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function remove($data, array $context = [])
    {
    }
}
