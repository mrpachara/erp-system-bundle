<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Service;

use Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery as QueryInterface;
use Erp\Bundle\CoreBundle\Infrastructure\ORM\Service\CoreAccountQuery as ParentQuery;

abstract class SystemAccountQuery extends ParentQuery implements QueryInterface
{
    public function searchOptions() {
        $result = parent::searchOptions();

        $result['search']['fields'] = array_values(array_diff($result['search']['fields'], ['code']));
        $result['search']['fields'][] = 'systemId';

        array_unshift($result['order']['fields'], 'systemId ASC');

        return $result;
    }
}
