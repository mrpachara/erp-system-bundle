<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\SystemBundle\Model\SystemUserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="system.user")
 */
class SystemUser extends SystemAccountBase implements SystemUserInterface{
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

    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
