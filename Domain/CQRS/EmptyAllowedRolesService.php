<?php

namespace Erp\Bundle\SystemBundle\Domain\CQRS;

class EmptyAllowedRolesService implements AllowedRolesService
{
    private static ?self $instance = null;

    static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    /**
     * {@inheritDoc}
     */
    function filter(array $roles): array
    {
        return [];
    }
}
