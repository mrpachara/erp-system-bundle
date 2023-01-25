<?php

namespace Erp\Bundle\SystemBundle\Domain\CQRS;

interface AllowedRolesService
{
    function filter(array $roles): array;
}
