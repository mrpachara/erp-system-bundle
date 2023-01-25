<?php

namespace Erp\Bundle\SystemBundle\Controller;

/**
 * System Account Api Command
 */
abstract class SystemAccountApiCommand extends SystemApiCommand
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\SystemAccountAuthorization
     */
    protected $authorization = null;

    /**
     * @var \Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery
     */
    protected $domainQuery;


    /** {@inheritDoc} */
    protected function patchExistedItem($item, $data)
    {
        if ($item->getSystemId() === 'admin') $data['systemId'] = 'admin';

        if (!$this->authorization->manageRole($item) || !is_array($data['individualRoles'])) {
            unset($data['individualRoles']);
        }

        if (isset($data['individualRoles'])) {
            if (!$this->authorization->updateRoleManageable($item)) {
                if (in_array('SYSTEM_ROLE_MANAGEABLE', $item->getIndividualRoles())) {
                    if (!in_array('SYSTEM_ROLE_MANAGEABLE', $data['individualRoles'])) {
                        $data['individualRoles'][] = 'SYSTEM_ROLE_MANAGEABLE';
                    } else {
                        $data['individualRoles'] = array_filter($data['individualRoles'], function ($role) {
                            return $role !== 'SYSTEM_ROLE_MANAGEABLE';
                        });
                    }
                }
            }

            $data['individualRoles'] = array_values(array_unique($data['individualRoles']));
        }

        return parent::patchExistedItem($item, $data);
    }
}
