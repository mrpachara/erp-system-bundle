<?php

namespace Erp\Bundle\SystemBundle\Model;

/**
 */
interface SystemGroupInterface extends SystemAccountInterface{
    /**
     * Add system account
     *
     * @param SystemAccountInterface $account
     *
     * @return GroupInterface
     */
    public function addSystemAccount(SystemAccountInterface $account);

    /**
     * Remove system account
     *
     * @param SystemAccountInterface $account
     */
    public function removeSystemAccount(SystemAccountInterface $account);

    /**
     * Get system accounts
     *
     * @return array
     */
    public function getSystemAccounts();
}
