<?php

namespace Erp\Bundle\SystemBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * System User Api Command Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/system-user")
 */
class SystemUserApiCommandController extends SystemAccountApiCommand
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
    protected $domainQuery;

    /** @required */
    public function setDomainQuery(\Erp\Bundle\SystemBundle\Domain\CQRS\SystemUserQuery $domainQuery)
    {
        $this->domainQuery = $domainQuery;
    }

    /** @var \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface */
    protected $passwordEncoder;

    /** @required */
    public function setPasswordEncoder(\Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function prepareItemAfterPatch($item)
    {
        if(!empty($item->getPlainPassword())) {
            $password = $this->passwordEncoder->encodePassword($item, $item->getPlainPassword());
            $item->setPassword($password);
        }

        return $item;
    }
}
