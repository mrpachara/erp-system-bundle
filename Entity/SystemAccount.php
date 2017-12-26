<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Erp\Bundle\CoreBundle\Collection\ArrayCollection;
use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * System Account Entity
 */
abstract class SystemAccount extends CoreAccount{
    /**
     * @var string[]
     */
    protected $individualRoles;

    /**
     * @var ArrayCollection
     */
    protected $systemGroups;

    /**
     * constructor
     *
     * @param Thing|null $thing
     */
    public function __construct(Thing $thing = null) {
        parent::__construct($thing);
        $this->individualRoles = [];
        $this->systemGroups = new ArrayCollection();
    }

    /**
     * Get indeividual roles
     *
     * @return string[]
     */
    public function getIndividualRoles(){
        return $this->individualRoles;
    }

    /**
     * Get indeividual roles
     *
     * @param string[] $individualRoles
     *
     * @return SystemAccount
     */
    public function setIndividualRoles(array $individualRoles){
        $this->individualRoles = $individualRoles;

        return $this;
    }

    /**
     * Add indeividual role
     *
     * @param string $role
     *
     * @return SystemAccount
     */
    public function addIndividualRole(string $role){
        if(!in_array($role, $this->individualRoles)) $this->individualRoles[] = $role;

        return $this;
    }

    /**
     * Remove indeividual role
     *
     * @param string $role
     */
    public function removeIndividualRole(string $role){
        unset($this->individualRoles[array_search($role, $this->individualRoles)]);
    }

    /**
     * Get roles
     *
     * @return string[]
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

            $roles = array_merge($roles, (array)$groups[$i]->getIndividualRoles());
        }

        return array_unique((array)$roles);
    }

    /**
     * Get system groups
     *
     * @return SystemGroup[]
     */
    public function getSystemGroups(){
        return $this->systemGroups->toArray();
    }

    /**
     * Add system group
     *
     * @param SystemGroup $systemGroup
     *
     * @return SystemAccount
     */
    public function addSystemGroup(SystemGroup $systemGroup){
        if(!$this->systemGroups->contains($systemGroup))
          $this->systemGroups[] = $systemGroup;

        return $this;
    }

    /**
     * Remove system group
     *
     * @param SystemGroup $systemGroup
     */
    public function removeSystemGroup(SystemGroup $systemGroup){
        $this->systemGroups->removeElement($systemGroup);
    }
}
