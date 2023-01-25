<?php

declare(strict_types=1);

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Erp\Bundle\SystemBundle\Entity\SystemAccount as Entity;
use Erp\Bundle\SystemBundle\Infrastructure\ORM\Service\AllowedRolesService;

class SystemAccountListener
{
    private AllowedRolesService $allowedRolesService;

    function __construct(AllowedRolesService $allowedRolesService)
    {
        $this->allowedRolesService = $allowedRolesService;
    }

    public function postLoad(Entity $entity, LifecycleEventArgs $event)
    {
        $entity->setAllowedRolesService($this->allowedRolesService);
    }

    public function prePersist(Entity $entity, LifecycleEventArgs $event)
    {
        $entity->setAllowedRolesService($this->allowedRolesService);
    }
}
