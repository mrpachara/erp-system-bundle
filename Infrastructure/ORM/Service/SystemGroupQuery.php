<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemGroupQuery as QueryInterface;

abstract class SystemGroupQuery extends SystemAccountQuery implements QueryInterface
{
}
