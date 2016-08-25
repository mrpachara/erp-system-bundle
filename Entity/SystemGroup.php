<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

use Erp\Bundle\SystemBundle\Model\SystemGroupTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="system.group")
 */
class SystemGroup extends SystemAccount implements SystemGroupInterface{
    use SystemGroupTrait;

    /**
     * @ORM\ManyToMany(targetEntity="SystemAccount", inversedBy="groups")
     * @ORM\JoinTable(name="system.groupaccount",
     *  joinColumns={@ORM\JoinColumn(name="id_system_group", nullable=false, onDelete="cascade")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="id_system_account", nullable=false, onDelete="cascade")}
     * )
     *
     * @var ArrayCollection $accounts
     */
    private $accounts;

    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
        $this->accounts = new ArrayCollection();
    }
}
