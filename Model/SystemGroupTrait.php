<?php
namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

/**
 * System group Trait
 */
trait SystemGroupTrait{
    public function addSystemAccount(SystemAccountInterface $account)
    {
        $this->accounts[] = $account;

        return $this;
    }

    public function removeSystemAccount(SystemAccountInterface $account)
    {
        $this->accounts->removeElement($account);
    }

    public function getSystemAccounts()
    {
        return $this->accounts->toArray();
    }
}
