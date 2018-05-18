<?php

namespace Erp\Bundle\SystemBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * System User Api Query Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/system-user")
 */
class SystemUserApiQueryController extends SystemAccountApiQuery
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\SystemUserAuthorization
     */
    protected $authorization;

    /** @required */
    public function setAuthorization(\Erp\Bundle\SystemBundle\Authorization\SystemUserAuthorization $authorization)
    {
        $this->authorization = $authorization;
    }

    /**
     * @var \Erp\Bundle\SystemBundle\Domain\CQRS\SystemUserQuery
     */
    public $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\SystemBundle\Domain\CQRS\SystemUserQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }
}
