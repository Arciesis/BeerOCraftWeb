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
            $relatedWaterGrainRatio = $nextInfusionWithoutGrainAdjunct->getWaterGrainRatioId();
             number_format(
                 ($nextInfusionWithoutGrainAdjunct->getwaterVolumeToAdd() + $relatedWaterGrainRatio->getIniTWaterVolume()) * 1000 /
                 $relatedWaterGrainRatio->getInitMashDryGrain()
                 ,3);
        }
    }
}

