<?php

namespace Erp\Bundle\SystemBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiQuery;

/**
 * System Api Query
 */
abstract class SystemApiQuery extends CoreAccountApiQuery
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\AbstractSystemAuthorization
     */
    protected $authorization = null;
}
