<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

class SystemAccountQueryService extends SystemAccountQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpSystemBundle:SystemAccount');
    }
}
