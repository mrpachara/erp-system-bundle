<?php

namespace Erp\Bundle\SystemBundle\Authorization;

use Erp\Bundle\SystemBundle\Entity\SystemAccount;

abstract class AbstractSystemAccountAuthorization extends AbstractSystemAuthorization
{
    public function list(...$args)
    {
        return parent::list(...$args) &&
            $this->specialRole('list', ...$args);
    }

    public function get(...$args)
    {
        return parent::get(...$args) &&
            $this->specialRole('get', ...$args);
    }

    public function add(...$args)
    {
        return parent::add(...$args) &&
            $this->specialRole('add', ...$args);
    }

    public function edit(...$args)
    {
        return parent::edit(...$args) &&
            $this->specialRole('edit', ...$args);
    }

    public function delete(...$args)
    {
        return parent::delete(...$args) &&
            $this->specialRole('delete', ...$args);
    }

    public function manageRole(...$args)
    {
        return $this->authorizationChecker->isGranted('ROLE_SYSTEM_ROLE_MANAGEABLE');
    }

    public function updateRoleManageable(SystemAccount $systemAccount)
    {
        return $this->manageRole($systemAccount) &&
            ($this->authorizationChecker->isGranted('ROLE_ROOT') ||
                $systemAccount->getSystemId() !== 'admin'
            );
    }

    protected function specialRole($type, $item = null)
    {
        if (empty($item)) {
            return true;
        }

        if ($item instanceof SystemAccount) {
            if ($item->getSystemId() === 'root') {
                return false;
            }

            if ($item->getSystemId() === 'admin') {
                if (($type === 'add') || ($type === 'delete')) {
                    return false;
                }

                if ($type === 'edit') {
                    return $this->authorizationChecker->isGranted('ROLE_ADMIN');
                }
            }
        }

        return true;
    }
}
