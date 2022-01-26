<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\MashVolume;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class MashVolumeEventSubscriber implements EventSubscriberInterface
{

    /*    public function __construct(private MashVolume $mashVolume)
        {
        }*/

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
        if ($event->getControllerResult() instanceof MashVolume) {
            $mashVolume = $event->getControllerResult();
            $mashVolume->setMashVolume($mashVolume->getMassGrainInMash() * ($mashVolume->getWaterGrainRatio() + 0.667));
        }
    }
}
