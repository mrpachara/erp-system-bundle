<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleInterface;
use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

use Erp\Bundle\CoreBundle\Entity\CoreAccountBase;
use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="system.account")
 */
class SystemAccount extends CoreAccountBase implements SystemAccountInterface{
    /**
     * @ORM\OneToMany(targetEntity="SystemAccountRole", mappedBy="account")
     *
     * @var ArrayCollection
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity="SystemGroup", mappedBy="accounts")
     *
     * @var ArrayCollection
     */
    private $groups;

    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
        $this->roles = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

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
