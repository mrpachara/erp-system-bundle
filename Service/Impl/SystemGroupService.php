<?php

namespace Erp\Bundle\SystemBundle\Service\Impl;

use Erp\Bundle\SystemBundle\Repository\SystemGroupRepositoryInterface;
use Erp\Bundle\SystemBundle\Service\SystemGroupServiceInterface;

/*
 * Sysetm user Service Interface
 */
class SystemGroupService extends SystemAccountService implements SystemGroupServiceInterface{
    /**
     * @var SystemGroupRepositoryInterface
     */
    protected $repository;

    /**
     * Class constructor
     *
     * @param SystemGroupRepositoryInterface $repository
     */
    public function __construct(SystemGroupRepositoryInterface $repository){
        $this->repository = $repository;
    }
}
