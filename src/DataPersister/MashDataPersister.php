<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Mash;

class MashDataPersister implements ContextAwareDataPersisterInterface
{

    // TODO finir ce DataPersister quand tous les items d'une mash seront en ApiRessource()

    /**
     * @inheritDoc
     */
    public function supports($data, array $context = []): bool
    {
        // dd($context);
        if ($data instanceof Mash && $context['collection_operation_name'] === 'post') {
            return true;
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function persist($data, array $context = [])
    {

    }

    /**
     * @inheritDoc
     */
    public function remove($data, array $context = [])
    {
        // TODO: Implement remove() method.
    }
}
