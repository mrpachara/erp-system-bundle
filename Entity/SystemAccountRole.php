<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleTrait;
/**
 * @ORM\Entity
 * @ORM\Table(name="system.accountrole", uniqueConstraints={@ORM\UniqueConstraint(columns={"id_system_account", "role"})})
 */
class SystemAccountRole implements SystemAccountRoleInterface{
    use SystemAccountRoleTrait;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="SystemAccount", inversedBy="roles")
     * @ORM\JoinColumn(name="id_system_account", nullable=false, onDelete="cascade")
     *
     * @var SystemAccountInterface
     */
    private $account;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", nullable=false, length=64)
     *
     * @var string
     */
    private $role;

    /**
     * constructor
     *
     * @param string $role
     */
    public function __construct(string $role = null) {
        parent::__construct();
        $this->$role = $role;
    }
}
