<?php
namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Doctrine\ORM\QueryBuilder;

/**
 *
 * @author pachara
 *        
 */
class SystemAccountQueryHelper
{
    function exceptSpecial(QueryBuilder $qb, string $alias): QueryBuilder
    {
        return $qb->andWhere("{$alias}.systemId <> 'root'");
    }
}

