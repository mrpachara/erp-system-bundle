<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Model\ThingInterface;
use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountTrait;

/**
 * @ORM\Entity(repositoryClass="Erp\Bundle\SystemBundle\Repository\ORM\SystemAccountRepository")
 * @ORM\Table(name="system.saccount")
 * @ORM\InheritanceType("JOINED")
 */
class SystemAccount extends CoreAccount implements SystemAccountInterface{
    use SystemAccountTrait;

    /**
     * @ORM\OneToMany(targetEntity="SystemAccountRole", mappedBy="account", cascade={"persist", "merge"}, orphanRemoval=true)
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
     *
     * @param ThingInterface $thing
     */
    public function __construct(ThingInterface $thing = null) {
        parent::__construct($thing);
        $this->roles = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }
}
