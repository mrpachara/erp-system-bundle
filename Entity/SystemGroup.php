<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Erp\Bundle\CoreBundle\Collection\ArrayCollection;
use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * System Group Entity
 */
class SystemGroup extends SystemAccount{
    /**
     * @var ArrayCollection
     */
    protected $accounts;

    /**
     * constructor
     *
     * @param Thing $thing
     */
    public function __construct(Thing $thing = null) {
        parent::__construct($thing);
        $this->accounts = new ArrayCollection();
    }

    // TODO bidirection for accounts
}
