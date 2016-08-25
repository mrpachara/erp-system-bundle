<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleInterface;
use Symfony\Component\Security\Core\Role\RoleInterface as SymfonyRoleInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleTrait;
/**
 * @ORM\Entity
 * @ORM\Table(name="system.accountrole", uniqueConstraints={@ORM\UniqueConstraint(columns={"id_system_account", "role"})})
 */
class SystemAccountRole implements SystemAccountRoleInterface, SymfonyRoleInterface{
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
     */
    public function __construct() {
        parent::__construct();
    }
}
