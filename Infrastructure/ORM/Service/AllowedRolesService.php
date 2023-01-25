<?php

declare(strict_types=1);

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Erp\Bundle\SettingBundle\Domain\CQRS\SettingQuery;
use Erp\Bundle\SystemBundle\Domain\CQRS\AllowedRolesService as AllowedRolesServiceInterface;

class AllowedRolesService implements AllowedRolesServiceInterface
{
    private SettingQuery $settingQuery;

    private ?array $allowedRoles = null;

    function __construct(SettingQuery $settingQuery)
    {
        $this->settingQuery = $settingQuery;
    }

    /**
     * {@inheritDoc}
     */
    function filter(array $roles): array
    {
        if (null === $this->allowedRoles) {
            $this->allowedRoles = $this->settingQuery->findOneByCode('allowedroles')->getValue()['roles'];
        }

        return \array_intersect($this->allowedRoles, $roles);
    }
}
