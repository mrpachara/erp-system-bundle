<?php

namespace Erp\Bundle\SystemBundle\Service;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemUserQuery;

class UserProvider implements UserProviderInterface
{
    /** @var SystemUserQuery */
    protected $domainQuery;

    /**
     * Constructor
     *
     * @param
     */
    public function __construct(SystemUserQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        // TODO: \Symfony\Component\Security\Core\Exception\UsernameNotFoundException
        return $this->domainQuery->findOneBySystemId($username);
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        // TODO: change to refresh from entity manager
        // TODO: \Symfony\Component\Security\Core\Exception\UnsupportedUserException
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return is_a($class, $this->domainQuery->getClassName(), true);
    }
}
