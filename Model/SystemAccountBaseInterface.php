<?php
namespace Erp\Bundle\SystemBundle\Model;

/**
 */
interface SystemAccountBaseInterface{
    /**
     * Set system account
     *
     * @param SystemAccountInterface $account
     *
     * @return SystemAccountBaseInterface
     */
    public function setSystemAccount(SystemAccountInterface $account);

    /**
     * Get system account
     *
     * @return SystemAccountInterface
     */
    public function getSystemAccount();
}
