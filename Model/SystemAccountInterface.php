<?php

namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\CoreBundle\Model\CoreAccountInterface;

/**
 * System account Interface
 */
interface SystemAccountInterface extends CoreAccountInterface{
    /**
     * Add role
     *
     * @param SystemAccountRoleInterface $role
     *
     * @return SystemAccountInterface
     */
    public function addRole(SystemAccountRoleInterface $role);

    /**
     * Remove role
     *
     * @param SystemAccountRoleInterface $role
     */
    public function removeRole(SystemAccountRoleInterface $role);

    /**
     * Get roles
     *
     * @return SystemAccountRoleInterface[]
     */
    public function getRoles();

    /**
     * Add system group
     *
     * @param SystemGroupInterface $group
     *
     * @return SystemAccountInterface
     */
    public function addGroup(SystemGroupInterface $group);

    /**
     * Remove system group
     *
     * @param SystemGroupInterface $group
     */
    public function removeGroup(SystemGroupInterface $group);

    /**
     * Get system groups
     *
     * @return SystemGroupInterface[]
     */
    public function getGroups();
}
