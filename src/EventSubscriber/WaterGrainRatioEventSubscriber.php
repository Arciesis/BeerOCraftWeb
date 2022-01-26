<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\WaterGrainRatio;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class WaterGrainRatioEventSubscriber implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
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
        if ($event->getControllerResult() instanceof WaterGrainRatio) {
            $waterGrainRatio = $event->getControllerResult();
            $waterGrainRatio->setInitWaterGrainRatio($waterGrainRatio->getInitWaterVolume() * 1000 / $waterGrainRatio->getInitMashDryGrain());
        }
    }
}
