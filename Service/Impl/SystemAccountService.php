<?php

namespace Erp\Bundle\SystemBundle\Service\Impl;

use Erp\Bundle\CoreBundle\Service\Impl\CoreAccountService;
use Erp\Bundle\SystemBundle\Repository\SystemAccountRepositoryInterface;
use Erp\Bundle\SystemBundle\Service\SystemAccountServiceInterface;

/*
 * Sysetm account Service Interface
 */
class SystemAccountService extends CoreAccountService implements SystemAccountServiceInterface{
    /**
     * @var SystemAccountRepositoryInterface
     */
    protected $repository;

    /**
     * Class constructor
     *
     * @param SystemAccountRepositoryInterface $repository
     */
    public function __construct(SystemAccountRepositoryInterface $repository){
        $this->repository = $repository;
    }
}
