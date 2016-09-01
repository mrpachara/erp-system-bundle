<?php

namespace Erp\Bundle\SystemBundle\Service\Impl;

use Erp\Bundle\SystemBundle\Repository\SystemUserRepositoryInterface;
use Erp\Bundle\SystemBundle\Service\SystemUserServiceInterface;

/*
 * Sysetm user Service Interface
 */
class SystemUserService extends SystemAccountService implements SystemUserServiceInterface{
    /**
     * @var SystemUserRepositoryInterface
     */
    protected $repository;

    /**
     * Class constructor
     *
     * @param SystemUserRepositoryInterface $repository
     */
    public function __construct(SystemUserRepositoryInterface $repository){
        $this->repository = $repository;
    }
}
