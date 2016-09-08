<?php

namespace Erp\Bundle\SystemBundle\Model;

use JMS\Serializer\Annotation as JMSSerializer;

use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

/**
 * System account Trait
 */
trait SystemAccountTrait{
    /**
     * @inheritDoc
     */
    public function addIndividualRole(string $role){
        if(!in_array($role, $this->roles)) $this->roles[] = $role;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeIndividualRole(string $role){
        unset($this->roles[array_search($role, $this->roles)]);
    }

    /**
     * @inheritDoc
     *
     * @JMSSerializer\VirtualProperty
     * @JMSSerializer\Type("array")
     */
    public function getIndividualRoles(){
        return $this->roles;
    }

    /**
     * @inheritDoc
     *
     * @JMSSerializer\VirtualProperty
     * @JMSSerializer\Type("array")
     */
    public function getRoles(){
        $roles = $this->getIndividualRoles();

        $groups = $this->getSystemGroups();

        for($i = 0; $i < count($groups); $i++){
            foreach($groups[$i]->getSystemGroups() as $group){
                if(!in_array($group, $groups)){
                    $groups[] = $group;
                }
            }

            $roles = array_merge($roles, $groups[$i]->getIndividualRoles());
        }

        return array_unique($roles);
    }

    /**
     * @inheritDoc
     */
    public function addSystemGroup(SystemGroupInterface $group){
        if(!in_array($group, $this->groups)) $this->groups[] = $group;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeSystemGroup(SystemGroupInterface $group){
        $this->groups->removeElement($group);
    }

    /**
     * @inheritDoc
     *
     * @JMSSerializer\VirtualProperty
     * @JMSSerializer\Type("array")
     */
    public function getSystemGroups(){
        return $this->groups->toArray();
    }
}
