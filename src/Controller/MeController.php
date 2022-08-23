<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Security;

class MeController
{
    public function __construct(private Security $security)
    {
        $this->security = $security;
        $this->beerRecipes = new ArrayCollection();

    }

    public function __invoke()
    {
        $user = $this->security->getUser();
        return $user;

    }
}