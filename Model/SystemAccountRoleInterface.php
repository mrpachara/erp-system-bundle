<?php
namespace Erp\Bundle\SystemBundle\Model;

/**
 */
interface SystemAccountRoleInterface{
    /**
     * Set role
     *
     * @param string $role
     *
     * @return SystemAccountRoleInterface
     */
    public function setRole(string $role);

    /**
     * Get role
     *
     * @return string
     */
    public function getRole();

    /**
     * Set system account
     *
     * @param SystemAccountInterface $account
     *
     * @return SystemAccountRoleInterface
     */
    public function setSystemAccount(SystemAccountInterface $account);

    /**
     * Get system account
     *
     * @return SystemAccountInterface
     */
    public function getSystemAccount();
}
