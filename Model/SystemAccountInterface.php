<?php

namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\CoreBundle\Model\CoreAccountInterface;

/**
 */
interface SystemAccountInterface extends CoreAccountInterface{
    /**
     * Add role
     *
     * @param SystemAccountRoleInterface $role
     *
     * @return SystemAccountInterface
     */
    public function addSystemAccountRole(SystemAccountRoleInterface $role);

    /**
     * Remove role
     *
     * @param SystemAccountRoleInterface $role
     */
    public function removeSystemAccountRole(SystemAccountRoleInterface $role);

    /**
     * Get roles
     *
     * @return array
     */
    public function getSystemAccountRoles();

    /**
     * Add system group
     *
     * @param SystemGroupInterface $group
     *
     * @return SystemAccountInterface
     */
    public function addSystemGroup(SystemGroupInterface $group);

    /**
     * Remove system group
     *
     * @param GroupInterface $group
     */
    public function removeSystemGroup(SystemGroupInterface $group);

    /**
     * Get system groups
     *
     * @return array
     */
    public function getSystemGroups();
}
