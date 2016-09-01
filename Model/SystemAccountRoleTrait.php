<?php

namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

/**
 * System account_role Trait
 */
trait SystemAccountRoleTrait{
    /**
     * @inheritDoc
     */
    public function setRole(string $role){
        $this->role = $role;

        return $this;
    }

    /**
     * @inheritDoc
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
}
