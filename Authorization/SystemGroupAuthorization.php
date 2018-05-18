<?php

namespace Erp\Bundle\SystemBundle\Authorization;

class SystemGroupAuthorization extends AbstractSystemAccountAuthorization
{
    public function list(...$args) {
        return parent::list(...$args) && 
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_LIST_SYSTEM_GROUP'))
        ;
    }
    
    public function get(...$args) {
        return parent::get(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_VIEW_SYSTEM_GROUP'))
        ;
    }
    
    public function add(...$args) {
        return parent::add(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_CREATE_SYSTEM_GROUP'))
        ;
    }
    
    public function edit(...$args) {
        return parent::edit(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_EDIT_SYSTEM_GROUP'))
        ;
    }
    
    public function delete(...$args) {
        return parent::delete(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_DELETE_SYSTEM_GROUP'))
        ;
    }
}
