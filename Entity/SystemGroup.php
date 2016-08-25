<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="system.group")
 */
class SystemGroup extends SystemAccountBase implements SystemGroupInterface{
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

    public function addSystemAccount(SystemAccountInterface $account)
    {
        $this->accounts[] = $account;

        return $this;
    }

    public function removeSystemAccount(SystemAccountInterface $account)
    {
        $this->accounts->removeElement($account);
    }

    public function getSystemAccounts()
    {
        return $this->accounts->toArray();
    }
}
