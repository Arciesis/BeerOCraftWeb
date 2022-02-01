<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\NextInfusionMashStepWithoutGrainAdjunct;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class NextInfusionMashStepWithoutGrainAdjunctEventSubscriber implements EventSubscriberInterface
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
        // dd($event->getControllerResult());
        if ($event->getControllerResult() instanceof NextInfusionMashStepWithoutGrainAdjunct) {
            $nextInfusionWithoutGrainAdjunct = $event->getControllerResult();
            // is that correct ? or need I to put some things to the respository ?
            $relatedWaterGrainRatio = $nextInfusionWithoutGrainAdjunct->getWaterGrainRatioId();

            // (G23-G18)*(0,41*(G19/1000)+G20)/(G22-G23)
            // = (wantedTempAtNextStep - initWaterTemp) * (0.41* (initMashDryGrain / 1000) + initWaterVolume) /
            // (waterAdjunctTemp - wantedTempAtNextStep)

            // Compute and populate the waterVolumeToAdd field
            $nextInfusionWithoutGrainAdjunct->setWaterVolumeToAdd(
                ($nextInfusionWithoutGrainAdjunct->getWantedTempAtNextStep() - $relatedWaterGrainRatio->getInitMashTemp(
                    )) * (0.41 * ($relatedWaterGrainRatio->getInitMashDryGrain(
                        ) / 1000) + $relatedWaterGrainRatio->getInitWaterVolume(
                    )) / ($nextInfusionWithoutGrainAdjunct->getWaterAdjunctTemp(
                    ) - $nextInfusionWithoutGrainAdjunct->getWantedTempAtNextStep())
            );


            // compute and populate the newWaterGrainRatio field
            $nextInfusionWithoutGrainAdjunct->setNewWaterGrainRatio(
                ($nextInfusionWithoutGrainAdjunct->getwaterVolumeToAdd() + $relatedWaterGrainRatio->getIniTWaterVolume(
                    )) * 1000 /
                $relatedWaterGrainRatio->getInitMashDryGrain()
            );
        }
    }
}

