<?php

namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\CoreBundle\Model\CoreAccountInterface;

/**
 * System account Interface
 */
interface SystemAccountInterface extends CoreAccountInterface{
    /**
     * Add indeividual role
     *
     * @param string $role
     *
     * @return SystemAccountInterface
     */
    public function addIndividualRole(string $role);

    /**
     * Remove indeividual role
     *
     * @param string $role
     */
    public function removeIndividualRole(string $role);

    /**
     * Get indeividual roles
     *
     * @return string[]
     */
    public function getIndividualRoles();

    /**
     * Get roles
     *
     * @return string[]
     */
    public function getRoles();

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
     * @param SystemGroupInterface $group
     */
    public function removeSystemGroup(SystemGroupInterface $group);

    /**
     * Get system groups
     *
     * @return SystemGroupInterface[]
     */
    public function getSystemGroups();
}
