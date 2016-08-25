<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleInterface;
use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountTrait;
/**
 * @ORM\Entity
 * @ORM\Table(name="system.account")
 * @ORM\InheritanceType("JOINED")
 */
class SystemAccount extends CoreAccount implements SystemAccountInterface{
    use SystemAccountTrait;

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
}
