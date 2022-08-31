<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class UserVoter extends Voter
{
    // const EDIT = 'USER_EDIT';

    private ?Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['ROLE_USER'])
            && $subject instanceof User;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'ROLE_USER':
                // logic to determine if the user can EDIT
                // return true or false
                return $this->canEdit($subject, $user);
        }

        return false;
    }

    private function canEdit(UserInterface $subjectUser, UserInterface $user): bool
    {
        if (in_array('ROLE_ADMIN',$user->getRoles())){
            return true;
        } else if ($user->getUserIdentifier() === $subjectUser->getUserIdentifier()) {
            return true;
        }
        return false;
    }
}
