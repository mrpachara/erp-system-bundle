<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Doctrine\ORM\QueryBuilder;
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
    protected $systemAccountQh;

    /** @required */
    public function setSystemAccountQueryHelper(SystemAccountQueryHelper $systemAccountQh)
    {
        $this->systemAccountQh = $systemAccountQh;
    }

    public function findAll()
    {
        $alias = '_entity';
        $qb = $this->systemAccountQh->exceptSpecial($this->repository->createQueryBuilder($alias), $alias);

        return $qb->getQuery()->getResult();
    }

    public function searchQueryBuilder(array $params, string $alias, &$context = null) : QueryBuilder
    {
        $alias = (empty($alias))? '_entity' : $alias;

        return $this->systemAccountQh->exceptSpecial(parent::searchQueryBuilder($params, $alias, $context), $alias);
    }
}
