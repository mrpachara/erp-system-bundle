<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

class SystemGroupQueryService extends SystemGroupQuery
{
    /** @required */
    public function setRepository(\Symfony\Bridge\Doctrine\RegistryInterface $doctrine)
    {
        $this->repository = $doctrine->getRepository('ErpSystemBundle:SystemGroup');
    }
}
