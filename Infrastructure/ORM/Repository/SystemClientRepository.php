<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemClientQuery as QueryInterface;
use Erp\Bundle\SystemBundle\Domain\CQRS\SystemClientCommand as CommandInterface;

/**
 * System Client repository (ORM)
 */
class SystemClientRepository extends SystemAccountRepository implements
  QueryInterface, CommandInterface{ }
