<?php

namespace Erp\Bundle\SystemBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * System Account Api Query Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/system-account")
 */
class SystemAccountApiQueryController extends SystemAccountApiQuery
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\SystemAccountAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\SystemBundle\Authorization\SystemAccountAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery
     */
    protected $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }
}
