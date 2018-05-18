<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemUserQuery as QueryInterface;

abstract class SystemUserQuery extends SystemAccountQuery implements QueryInterface
{
}
