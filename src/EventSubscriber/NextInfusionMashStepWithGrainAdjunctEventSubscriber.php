<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\NextInfusionMashStepWithGrainAdjunct;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
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

            // Compute te fileds and persist them (the last one is automatic due to the magic of ApiPlatform)
            // ((G34+273,15)*(G30*G6+((G29/1000)+(G32/1000))*G5)-(G28+273,15)*(G30*G6+(G29/1000)*G5)-(G33+273,15)*(G32/1000)*G5)/(G6*((G35+273,15)-(G34+273,15)))


            /**
             * EDIT: I figure it out with this [post][1], I just have to pass an array of IRI like this:
             * ```
             * "waterGrainRatioId": [
             * "/dashboard/water_grain_ratios/1",
             * "/dashboard/water_grain_ratios/2"
             * ]
             * ```
             * [1]: https://stackoverflow.com/questions/64547669/symfony-api-platform-many-to-many-relationship-only-working-in-one-way
             **/
        }
    }
}
