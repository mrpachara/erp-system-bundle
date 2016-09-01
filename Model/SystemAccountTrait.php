<?php

namespace Erp\Bundle\SystemBundle\Model;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleInterface;
use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

/**
 * System account Trait
 */
trait SystemAccountTrait{
    /**
     * @inheritDoc
     */
    public function addRole(SystemAccountRoleInterface $role){
        $this->roles[] = $role;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeRole(SystemAccountRoleInterface $role){
        $this->roles->removeElement($role);
    }

    /**
     * @inheritDoc
     */
    public function getRoles(){
        return $this->roles->toArray();
    }

    /**
     * @inheritDoc
     */
    public function addGroup(SystemGroupInterface $group){
        $this->groups[] = $group;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeGroup(SystemGroupInterface $group){
        $this->groups->removeElement($group);
    }

    /**
     * @inheritDoc
     */
    public function getGroups(){
        return $this->groups->toArray();
    }
}
