<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\CoreBundle\Model\ThingInterface;
use Erp\Bundle\SystemBundle\Model\SystemClientInterface;

use Erp\Bundle\SystemBundle\Model\SystemClientTrait;

/**
 * @ORM\Entity(repositoryClass="Erp\Bundle\SystemBundle\Repository\ORM\SystemClientRepository")
 * @ORM\Table(name="system.client")
 * @ORM\InheritanceType("JOINED")
 */
class SystemClient extends SystemAccount implements SystemClientInterface{
    use SystemClientTrait;

    /**
     * @ORM\Column(type="string", length=128)
     *
     * @var string
     */
    private $secret;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     *
     * @var string
     */
    private $redirectUris;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     *
     * @var string
     */
    private $allowedGrantTypes;

    /**
     * constructor
     *
     * @param ThingInterface $thing
     */
    public function __construct(ThingInterface $thing = null) {
        parent::__construct($thing);
        $this->redirectUris = [];
        $this->allowedGrantTypes = [];
    }
}
