<?php

namespace Erp\Bundle\SystemBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * System Group Api Query Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/system-group")
 */
class SystemGroupApiQueryController extends SystemAccountApiQuery
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\SystemGroupAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\SystemBundle\Authorization\SystemGroupAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\SystemBundle\Domain\CQRS\SystemGroupQuery
     */
    protected $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\SystemBundle\Domain\CQRS\SystemGroupQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }
}
