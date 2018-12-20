<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;

abstract class SystemAccountQuery extends ParentQuery implements QueryInterface
{
    public function searchOptions() {
        $result = parent::searchOptions();

        $result['term']['fields'] = array_values(array_diff($result['term']['fields'], ['code']));
        $result['term']['fields'][] = 'systemId';

        array_unshift($result['order']['fields'], 'systemId ASC');

        return $result;
    }
    
    /**
     * @var SystemAccountQueryHelper
     */
    protected $queryHelper;
    
    /** @required */
    public function setQueryHelper(SystemAccountQueryHelper $queryHelper)
    {
        $this->queryHelper = $queryHelper;
    }
    
    public function findAll()
    {
        $alias = '_entity';
        $qb = $this->queryHelper->exceptSpecial($this->repository->createQueryBuilder($alias), $alias);
        
        return $qb->getQuery()->getResult();
    }
    
    public function searchQueryBuilder(array $params, string $alias = null, &$context = null)
    {
        $alias = (empty($alias))? '_entity' : $alias;
        
        return $this->queryHelper->exceptSpecial(parent::searchQueryBuilder($params, $alias, $context), $alias);
    }
}
