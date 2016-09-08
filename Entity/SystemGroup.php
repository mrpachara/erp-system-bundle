<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Erp\Bundle\CoreBundle\Model\ThingInterface;
use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

use Erp\Bundle\SystemBundle\Model\SystemGroupTrait;

/**
 * @ORM\Entity(repositoryClass="Erp\Bundle\SystemBundle\Repository\ORM\SystemGroupRepository")
 * @ORM\Table(name="system.group")
 * @ORM\InheritanceType("JOINED")
 */
class SystemGroup extends SystemAccount implements SystemGroupInterface{
    use SystemGroupTrait;

    /**
     * constructor
     *
     * @param ThingInterface $thing
     */
    public function __construct(ThingInterface $thing = null) {
        parent::__construct($thing);
        $this->accounts = new ArrayCollection();
    }
}
