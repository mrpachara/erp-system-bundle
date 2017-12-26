<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemUserQuery as QueryInterface;
use Erp\Bundle\SystemBundle\Domain\CQRS\SystemUserCommand as CommandInterface;

/**
 * System User repository (ORM)
 */
class SystemUserRepository extends SystemAccountRepository implements
  QueryInterface, CommandInterface{ }
