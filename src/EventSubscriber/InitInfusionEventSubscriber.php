<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\InitInfusion;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authorization\Strategy\PriorityStrategy;

class InitInfusionEventSubscriber implements EventSubscriberInterface
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
        if ($event->getControllerResult() instanceof InitInfusion) {
            // G15 = (0,41/G14)*(G13-G12)+G13
            $initInfusion = $event->getControllerResult();
            $initInfusion->setWaterTempToAdjunct(
                (0.41 / $initInfusion->getWaterGrainRatio()) * ($initInfusion->getWantedMashTemp(
                    ) - $initInfusion->getInitGrainTemp()) + $initInfusion->getWantedMashTemp()
            );
        }
    }
}
