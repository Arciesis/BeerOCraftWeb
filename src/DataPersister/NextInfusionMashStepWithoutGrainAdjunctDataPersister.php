<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\NextInfusionMashStepWithoutGrainAdjunct;

class NextInfusionMashStepWithoutGrainAdjunctDataPersister implements ContextAwareDataPersisterInterface
{

    public function __construct(private DataPersisterInterface $decoratedDataPersister)
    {
    }

    /**
     * @inheritDoc
     */
    public function supports($data, array $context = []): bool
    {
        if ($data instanceof NextInfusionMashStepWithoutGrainAdjunct && $context['collection_operation_name'] === 'post') {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function persist($data, array $context = [])
    {
        // =(G23-G18)*(0,41*(G19/1000)+G20)/(G22-G23)
        // waterVolumeToAdd = (wantedTempNextStep-WaterGrainRatio::initMashTemp)*
        //(0.41 *(WaterGrainRatio::initMashDryGrain/1000)+WaterGrainRatio::initWaterVolume)
        ///(waterTempToAdd-waterTempNextStep)
        ///
        $relatedWaterGrainRatio = $data->getWaterGrainRatioId();

        $data->setWaterVolumeToAdd(
            number_format(
                ($data->getWantedTempAtNextStep() - $relatedWaterGrainRatio->getInitMashTemp()) *
                (0.41 * ($relatedWaterGrainRatio->getInitMashDryGrain(
                        ) / 1000) + $relatedWaterGrainRatio->getInitWaterVolume()) /
                ($data->getWaterAdjunctTemp() - $data->getWantedTempAtNextStep())
                ,
                3
            )
        );


        // newWaterGrainRatio = (WaterVolumeToAdd+WaterGrainRatio::initWaterVolume) * 1000 / WaterGrainRatio::initMashDryGrain

        $data->setNewWaterGrainRatio(
            number_format(
                ($data->getwaterVolumeToAdd() + $relatedWaterGrainRatio->getIniTWaterVolume()) * 1000 /
                $relatedWaterGrainRatio->getInitMashDryGrain()
            ,3)
        );

        $this->decoratedDataPersister->persist($data);
    }

    /**
     * @inheritDoc
     */
    public function remove($data, array $context = [])
    {
    }
}
