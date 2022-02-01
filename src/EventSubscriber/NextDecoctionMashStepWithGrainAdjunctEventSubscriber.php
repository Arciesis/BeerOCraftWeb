<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\NextDecoctionMashStepWithGrainAdjunct;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class NextDecoctionMashStepWithGrainAdjunctEventSubscriber implements EventSubscriberInterface
{


    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['computeValues', EventPriorities::PRE_WRITE],
        ];
    }

    public function computeValues(ViewEvent $event)
    {
        if ($event->getControllerResult() instanceof NextDecoctionMashStepWithGrainAdjunct) {

            // We get the objects we need
            $nextDecoctionMashStepWithGrainAdjunct = $event->getControllerResult();
            $waterGrainRatio = $nextDecoctionMashStepWithGrainAdjunct->getWaterGrainRatio();

            // We get the fields we need
            // values of DecoctionWaterGrainRatio
            $initMashTemp = $waterGrainRatio->getInitMashTemp();
            $initMashDryGrain = $waterGrainRatio->getInitMashDryGrain();
            $initWaterVolume = $waterGrainRatio->getInitWaterVolume();

            // Values of NexDecoctionMashStepWithGrainAdjunct
            $wantedTempAtNextStep = $nextDecoctionMashStepWithGrainAdjunct->getWantedTempNextStep();
            $decoctionWaterGrainRatio = $nextDecoctionMashStepWithGrainAdjunct->getDecoctionWaterGrainRatio();
            $waterTempToAdd = $nextDecoctionMashStepWithGrainAdjunct->getWaterTempToAdd();
            $decoctionBoilTime = $nextDecoctionMashStepWithGrainAdjunct->getDecoctionBoilTime();
            $evaporationRate = $nextDecoctionMashStepWithGrainAdjunct->getEvaporationRate();
            $grainMassToAdd = $nextDecoctionMashStepWithGrainAdjunct->getGrainMassToAdd();
            $grainTempToAdd = $nextDecoctionMashStepWithGrainAdjunct->getGrainTempToAdd();
            $waterVolumeToAdd = $nextDecoctionMashStepWithGrainAdjunct->getWaterVolumeToAdd();
            $tempOfBrewWaterAdjunct = $nextDecoctionMashStepWithGrainAdjunct->getTempOfBrewWaterAdjunct();

            // get the constant values
            $grainHeatCapacity = $nextDecoctionMashStepWithGrainAdjunct::GRAIN_HEAT_CAPACITY;
            $waterHeatCapacity = $nextDecoctionMashStepWithGrainAdjunct::WATER_HEAT_CAPACITY;
            // $celsius = $nextDecoctionMashStepWithGrainAdjunct::CELSIUS_TO_KELVIN_ADJUNCT;


            // compute the WaterVolumeToTake field
            $result = (($wantedTempAtNextStep + 273.15) * (($grainHeatCapacity * ($initMashDryGrain +
                                $grainMassToAdd) / 1000) + $waterHeatCapacity * $initWaterVolume + $waterVolumeToAdd *
                        $waterHeatCapacity) - ($initMashTemp + 273.15) * ($initWaterVolume * $waterHeatCapacity +
                        $grainHeatCapacity * $initMashDryGrain / 1000) - ($grainTempToAdd + 273.15) *
                    ($grainMassToAdd / 1000) * $grainHeatCapacity - ($tempOfBrewWaterAdjunct + 273.15) *
                    $waterVolumeToAdd * $waterHeatCapacity) / (((($waterTempToAdd + 273.15) -
                            ($initMashTemp + 273.15)) * $grainHeatCapacity + (($waterTempToAdd + 273.15) *
                            (1 - ($evaporationRate / 100) * ($decoctionBoilTime / 60)) -
                            ($initMashTemp + 273.15) + ($wantedTempAtNextStep + 273.15) * ($evaporationRate / 100) *
                            ($decoctionBoilTime / 60)) * $waterHeatCapacity * $decoctionWaterGrainRatio) /
                    ($decoctionWaterGrainRatio + 0.667));

            $nextDecoctionMashStepWithGrainAdjunct->setDecoctionVolumeToTake($result);


            $nextDecoctionMashStepWithGrainAdjunct->setNewWaterGrainRatio(
                ($initWaterVolume + $waterVolumeToAdd) * 1000 / ($initMashDryGrain + $grainMassToAdd)
            );

        }
    }
}
