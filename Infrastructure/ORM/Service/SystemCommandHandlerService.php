<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Doctrine\ORM\EntityManager;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemCommandHandler as CommandHandlerInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\SimpleCommandHandler as ParentCommandHandler;

class SystemCommandHandlerService extends ParentCommandHandler implements CommandHandlerInterface
{
}
