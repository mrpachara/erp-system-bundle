<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemGroupQuery as QueryInterface;
use Erp\Bundle\SystemBundle\Domain\CQRS\SystemGroupCommand as CommandInterface;

/**
 * System Group repository (ORM)
 */
class SystemGroupRepository extends SystemAccountRepository implements
  QueryInterface, CommandInterface{ }
