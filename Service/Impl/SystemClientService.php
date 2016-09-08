<?php

namespace Erp\Bundle\SystemBundle\Service\Impl;

use Erp\Bundle\SystemBundle\Repository\SystemClientRepositoryInterface;
use Erp\Bundle\SystemBundle\Service\SystemClientServiceInterface;
use FOS\OAuthServerBundle\Model\ClientInterface as FOSClientInterface;

/*
 * Sysetm user Service Interface
 */
class SystemClientService extends SystemAccountService implements SystemClientServiceInterface{
    /**
     * @var SystemClientRepositoryInterface
     */
    protected $repository;

    /**
     * Class constructor
     *
     * @param SystemClientRepositoryInterface $repository
     */
    public function __construct(SystemClientRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function createClient(){
        $class = $this->repository->getClassName();

        return new $class();
    }

    public function getClass(){
        return $this->getClassName();
    }

    public function findClientBy(array $criteria){
        return $this->repository->findOneBy($criteria);
    }

    public function findClientByPublicId($publicId){
        return $this->repository->findOneByCode($publicId);
    }

    public function updateClient(FOSClientInterface $client){
        return $this->save($client);
    }

    public function deleteClient(FOSClientInterface $client){
        return $this->remove($client);
    }
}
