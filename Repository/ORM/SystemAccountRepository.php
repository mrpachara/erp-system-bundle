<?php

namespace Erp\Bundle\SystemBundle\Repository\ORM;

use Erp\Bundle\CoreBundle\Repository\ORM\CoreAccountRepository;
use Erp\Bundle\SystemBundle\Repository\SystemAccountRepositoryInterface;
use Doctrine\ORM\Mapping;

/**
 * System account Repository (ORM)
 */
class SystemAccountRepository extends CoreAccountRepository implements SystemAccountRepositoryInterface{
}
