<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

class SystemUserQueryService extends SystemUserQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpSystemBundle:SystemUser');
    }
}
