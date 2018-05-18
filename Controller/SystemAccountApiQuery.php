<?php

namespace Erp\Bundle\SystemBundle\Controller;

/**
 * System Account Api Query
 */
abstract class SystemAccountApiQuery extends SystemApiQuery
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\AbstractSystemAccountAuthorization
     */
    protected $authorization = null;

    /**
     * @var \Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery
     */
    protected $domainQuery;
}
