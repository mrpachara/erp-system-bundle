<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Repository;

use Erp\Bundle\CoreBundle\Infrastructure\ORM\Repository\CoreAccountRepository;
use Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery as QueryInterface;
use Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountCommand as CommandInterface;

/**
 * System Account repository (ORM)
 */
class SystemAccountRepository extends CoreAccountRepository implements
  QueryInterface, CommandInterface{ }
