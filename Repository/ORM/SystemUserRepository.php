<?php

namespace Erp\Bundle\SystemBundle\Repository\ORM;

use Erp\Bundle\SystemBundle\Repository\SystemUserRepositoryInterface;

/**
 * System user Repository (ORM)
 */
class SystemUserRepository extends SystemAccountRepository implements SystemUserRepositoryInterface{
    /**
     * Translate pesudo field to real field
     *
     * @param array $criteria
     *
     * @return array
     */
    protected function translateCrireria(array $criteria){
        $_criteria = [];
        foreach($criteria as $field => $value){
            if('username' === $field) $field = 'code';

            $_criteria[$field] = $value;
        }

        return $_criteria;
    }

    public function findBy(array $criteria, array $orderBy = NULL, $limit = NULL, $offset = NULL){
        return parent::findBy($this->translateCrireria($criteria), $orderBy, $limit, $offset);
    }

    public function findOneBy(array $criteria, array $orderBy = NULL){
        return parent::findOneBy($this->translateCrireria($criteria), $orderBy);
    }
}
