<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Erp\Bundle\CoreBundle\Model\ThingInterface;
use Symfony\Component\Validator\Constraints as Assert;

use Erp\Bundle\SystemBundle\Model\SystemUserInterface;

use Erp\Bundle\SystemBundle\Model\SystemUserTrait;

/**
 * @ORM\Entity(repositoryClass="Erp\Bundle\SystemBundle\Repository\ORM\SystemUserRepository")
 * @ORM\Table(name="system.user")
 * @ORM\InheritanceType("JOINED")
 */
class SystemUser extends SystemAccount implements SystemUserInterface{
    use SystemUserTrait;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     *
     * @var string
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=128)
     *
     * @var string
     */
    private $password;

    /**
     * constructor
     *
     * @param ThingInterface $thing
     */
    public function __construct(ThingInterface $thing = null) {
        parent::__construct($thing);
    }
}
