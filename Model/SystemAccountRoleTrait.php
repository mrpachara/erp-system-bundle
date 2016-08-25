<?php
namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

/**
 * System account_role Trait
 */
trait SystemAccountRoleTrait{
    public function setRole(string $role)
    {
        $this->role = $role;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setSystemAccount(SystemAccountInterface $account)
    {
        $this->account = $account;

        return $this;
    }

    public function getSystemAccount()
    {
        return $this->account;
    }
}
