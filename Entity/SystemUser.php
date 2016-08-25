<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\SystemBundle\Model\SystemUserInterface;

use Erp\Bundle\SystemBundle\Model\SystemUserTrait;
/**
 * @ORM\Entity
 * @ORM\Table(name="system.user")
 */
class SystemUser extends SystemAccount implements SystemUserInterface{
    use SystemUserTrait;

    /**
     * @ORM\Column(type="string", length=256)
     *
     * @var string
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=256)
     *
     * @var string
     */
    private $password;

    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
    }
}
