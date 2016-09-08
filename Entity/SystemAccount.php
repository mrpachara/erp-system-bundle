<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMSSerializer;

use Erp\Bundle\CoreBundle\Entity\CoreAccount;
use Erp\Bundle\CoreBundle\Model\ThingInterface;
use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountTrait;

/**
 * @ORM\Entity(repositoryClass="Erp\Bundle\SystemBundle\Repository\ORM\SystemAccountRepository")
 * @ORM\Table(name="system.saccount")
 * @ORM\InheritanceType("JOINED")
 *
 * @JMSSerializer\ExclusionPolicy("all")
 */
class SystemAccount extends CoreAccount implements SystemAccountInterface{
    use SystemAccountTrait;

    /**
    * @ORM\Column(type="simple_array", nullable=true)
     *
     * @var string[]
     */
    private $roles;

    /**
     * @ORM\ManyToMany(targetEntity="SystemGroup")
     * @ORM\JoinTable(name="system.groupaccount",
     *  joinColumns={@ORM\JoinColumn(name="id_system_account", nullable=false, onDelete="cascade")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="id_system_group", nullable=false, onDelete="cascade")}
     * )
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
        $this->roles = [];
        $this->groups = new ArrayCollection();
    }
}
