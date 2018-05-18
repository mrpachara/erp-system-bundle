<?php

namespace Erp\Bundle\SystemBundle\Controller;

/**
 * System Account Api Command
 */
abstract class SystemAccountApiCommand extends SystemApiCommand
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\SystemAccountAuthorization
     */
    protected $authorization = null;

    /**
     * @var \Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery
     */
    protected $domainQuery;
}
