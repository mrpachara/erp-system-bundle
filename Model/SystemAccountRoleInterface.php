<?php

namespace Erp\Bundle\SystemBundle\Model;

use Symfony\Component\Security\Core\Role\RoleInterface as SymfonyRoleInterface;

/**
 */
interface SystemAccountRoleInterface extends SymfonyRoleInterface{
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
