<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\MashVolume;
use Doctrine\ORM\EntityManagerInterface;

class MashVolumeDataPersister implements ContextAwareDataPersisterInterface
{

    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports($data, array $context = []): bool
    {
       if ($data instanceof MashVolume && $context['collection_operation_name'] === 'post') {
           return true;
       }
       return false;
    }

    public function persist($data, array $context = [])
    {

        $data->setMashVolume($data->getMassGrainInMash()*($data->getWaterGrainRatio()+0.667));

        $this->em->persist($data);
        $this->em->flush();
        return $data;
    }

    public function remove($data, array $context = [])
    {
    }
}
