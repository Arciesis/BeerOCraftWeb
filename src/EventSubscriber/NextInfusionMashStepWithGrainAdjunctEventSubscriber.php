<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\NextInfusionMashStepWithGrainAdjunct;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class NextInfusionMashStepWithGrainAdjunctEventSubscriber implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
{

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['computeValues', EventPriorities::PRE_WRITE],
        ];
    }

    public function computeValues(ViewEvent $event)
    {
        if ($event->getControllerResult() instanceof NextInfusionMashStepWithGrainAdjunct) {
            $nextInfusionMashStepWithGrainAdjunct = $event->getControllerResult();
            $relatedWaterGrainRatio = $nextInfusionMashStepWithGrainAdjunct->getWaterGrainRatioId();

            // Compute te fields and persist them (the last step is automatic due to the magic of ApiPlatform)

            /**
             * WaterVolumeToAdd =
             * ((WantedTempAtNextStep + celsius) * (initWaterVolume * WATER_HEAT_CAPACITY + ((initMashDryGrain / 1000)
             * + (initMashDryGrainToAdd / 1000)) * GRAIN_HEAT_CAPACITY) - (initMashTemp + Celsius) *
             * (iniWaterVolume * WATER_HEAT_CAPACITY + (initMashDryGrain / 1000 ) * GRAIN_HEAT_CAPACITY) -
             * (tempOfGrainToAdd + celsius) * (GrainMassToAdd / 1000) * GRAIN_HEAT_CAPACITY) /
             * (WATER_HEAT_CAPACITY * ((WaterTempToAdd + celsius) - (WantedTempAtNextStep + celsius)))
             */

            // $initWaterGrainRatio = $relatedWaterGrainRatio->getInitWaterGrainRatio();
            $tempOfGrainToAdd = $nextInfusionMashStepWithGrainAdjunct->getTempOfGrainToAdd();
            $initMashDryGrain = $relatedWaterGrainRatio->getInitMashDryGrain();
            $initMashTemp = $relatedWaterGrainRatio->getInitMashTemp();
            $initWaterVolume = $relatedWaterGrainRatio->getInitWaterVolume();
            $grainMassToAdd = $nextInfusionMashStepWithGrainAdjunct->getGrainMassToAdd();
            $waterTempToAdd = $nextInfusionMashStepWithGrainAdjunct->getWaterTempToAdd();
            $wantedTempAtNextStep = $nextInfusionMashStepWithGrainAdjunct->getWantedTempAtNextStep();
            (float)$waterHeatCapacity = $nextInfusionMashStepWithGrainAdjunct::WATER_HEAT_CAPACITY;
            (float)$grainHeatCapacity = $nextInfusionMashStepWithGrainAdjunct::GRAIN_HEAT_CAPACITY;
            (float)$celsius = $nextInfusionMashStepWithGrainAdjunct::CELSIUS_TO_KELVIN_ADJUNCT;

            $result = (($wantedTempAtNextStep + $celsius) * (($initWaterVolume * $waterHeatCapacity) +
                        (($initMashDryGrain / 1000) + ($grainMassToAdd / 1000)) * $grainHeatCapacity) -
                    (($initMashTemp + $celsius) * ($initWaterVolume * $waterHeatCapacity + ($initMashDryGrain / 1000) *
                            $grainHeatCapacity)) - (($tempOfGrainToAdd + $celsius) * ($grainMassToAdd / 1000)) *
                    $grainHeatCapacity) / ($waterHeatCapacity * (($waterTempToAdd + $celsius) -
                        ($wantedTempAtNextStep + $celsius)))
            ;


            $nextInfusionMashStepWithGrainAdjunct->setWaterVolumeToAdd($result);

            $waterVolumeToAdd = $nextInfusionMashStepWithGrainAdjunct->getWaterVolumeToAdd();

            // newWaterGrainRatio = (initWaterVolume + WaterVolumeToAdd) * 1000 / (initMashDryGrain + GrainMassToAdd)

            $nextInfusionMashStepWithGrainAdjunct->setNewWaterGrainRatio(
                ($initWaterVolume + $waterVolumeToAdd) * 1000 / ($initMashDryGrain + $grainMassToAdd)
            );

        }
    }
}
