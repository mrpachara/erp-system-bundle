<?php

namespace Erp\Bundle\SystemBundle\Authorization;

class SystemGroupAuthorization extends AbstractSystemAccountAuthorization
{
    public function list(...$args)
    {
        return parent::list(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_SYSTEM_GROUP_LIST'));
    }

    public function get(...$args)
    {
        return parent::get(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_SYSTEM_GROUP_VIEW'));
    }

    public function add(...$args)
    {
        return parent::add(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_SYSTEM_GROUP_CREATE'));
    }

    public function edit(...$args)
    {
        return parent::edit(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_SYSTEM_GROUP_EDIT'));
    }

    public function delete(...$args)
    {
        return parent::delete(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_SYSTEM_GROUP_DELETE'));
    }
}
