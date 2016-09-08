<?php

namespace Erp\Bundle\SystemBundle\Model;

use JMS\Serializer\Annotation as JMSSerializer;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

/**
 * System account_role Trait
 */
trait SystemAccountRoleTrait{
    /**
     * @inheritDoc
     *
     * @JMSSerializer\VirtualProperty
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setRole(string $role){
        $this->role = $role;

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @JMSSerializer\VirtualProperty
     */
    public function getRole(){
        return $this->role;
    }

    /**
     * @inheritDoc
     */
    public function setSystemAccount(SystemAccountInterface $account){
        $this->account = $account;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSystemAccount(){
        return $this->account;
    }

    /**
     * @inheritDoc
     */
    public function __toString(){
        return $this->getSystemAccount().':'.$this->getRole();
    }
}
