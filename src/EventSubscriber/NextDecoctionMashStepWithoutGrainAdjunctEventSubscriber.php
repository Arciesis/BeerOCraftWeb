<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\NextDecoctionMashStepWithoutGrainAdjunct;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class NextDecoctionMashStepWithoutGrainAdjunctEventSubscriber implements EventSubscriberInterface
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
        if ($event->getControllerResult() instanceof NextDecoctionMashStepWithoutGrainAdjunct) {

            // get the main objects
            $nextDecoctionMashStepWithoutGrainAdjunct = $event->getControllerResult();
            $relatedWaterGrainRatio = $nextDecoctionMashStepWithoutGrainAdjunct->getWaterGrainRatio();

            // get the main fields of waterGrainRatio
            $initMashTemp = $relatedWaterGrainRatio->getInitMashTemp();
            $initMashDryGrain = $relatedWaterGrainRatio->getInitMashDryGrain();
            $initWaterVolume = $relatedWaterGrainRatio->getInitWaterVolume();

            // get the main fields of nextDecoctionMashStepWithoutGrainAdjunct
            $wantedTempAtNextStep = $nextDecoctionMashStepWithoutGrainAdjunct->getWantedTempNextStep();
            $decoctionWaterGrainRatio = $nextDecoctionMashStepWithoutGrainAdjunct->getDecoctionWaterGrainratio();
            $waterTempToAdd = $nextDecoctionMashStepWithoutGrainAdjunct->getWaterTempToAdd();
            $decoctionBoilTime = $nextDecoctionMashStepWithoutGrainAdjunct->getDecoctionBoilTime();
            $evaporationRate = $nextDecoctionMashStepWithoutGrainAdjunct->getEvaporationRate();

            // get the constants
            $grainHeatCapacity = $nextDecoctionMashStepWithoutGrainAdjunct::GRAIN_HEAT_CAPACITY;
            $waterHeatCapacity = $nextDecoctionMashStepWithoutGrainAdjunct::WATER_HEAT_CAPACITY;

            // compute the decoctionVolumetoTake field
            $result = (($decoctionWaterGrainRatio + 0.667) * (($wantedTempAtNextStep + 273.15) * ($grainHeatCapacity *
                            ($initMashDryGrain / 1000) + $initWaterVolume * $waterHeatCapacity) -
                        ($initMashTemp + 273.15) * ($initWaterVolume * $waterHeatCapacity + $grainHeatCapacity *
                            ($initMashDryGrain / 1000)))) / (($waterTempToAdd + 273.15) *
                    ($grainHeatCapacity + $decoctionWaterGrainRatio * $waterHeatCapacity *
                        (1 - ($evaporationRate / 100) * ($decoctionBoilTime / 60))) - ($initMashTemp + 273.15) *
                    ($grainHeatCapacity + $decoctionWaterGrainRatio * $waterHeatCapacity) +
                    ($wantedTempAtNextStep + 273.15) * ($decoctionWaterGrainRatio * $waterHeatCapacity *
                        ($evaporationRate / 100) * ($decoctionBoilTime / 60)));

            $nextDecoctionMashStepWithoutGrainAdjunct->setDecoctionVolumeToTake($result);

        }
    }
}
