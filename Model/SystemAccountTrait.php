<?php
namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleInterface;
use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

/**
 * System account Trait
 */
trait SystemAccountTrait{
    public function addSystemAccountRole(SystemAccountRoleInterface $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    public function removeSystemAccountRole(SystemAccountRoleInterface $role)
    {
        $this->roles->removeElement($role);
    }

    public function getSystemAccountRoles()
    {
        return $this->roles->toArray();
    }

    public function addSystemGroup(SystemGroupInterface $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    public function removeSystemGroup(SystemGroupInterface $group)
    {
        $this->groups->removeElement($group);
    }

    public function getSystemGroups()
    {
        return $this->groups->toArray();
    }
}
