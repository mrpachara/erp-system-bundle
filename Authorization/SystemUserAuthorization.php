<?php

namespace Erp\Bundle\SystemBundle\Authorization;

//use Symfony\Component\ExpressionLanguage\Expression;

class SystemUserAuthorization extends AbstractSystemAccountAuthorization
{
    public function list(...$args) {
// dump($this->authorizationChecker->isGranted(new Expression(
// '
// "LIST_SYSTEM_USER" in roles
// '
// )));
        return parent::list(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_SYSTEM_USER_LIST'))
        ;
    }
    
    public function get(...$args) {
        return parent::get(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_SYSTEM_USER_VIEW'))
        ;
    }
    
    public function add(...$args) {
        return parent::add(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_SYSTEM_USER_CREATE'))
        ;
    }
    
    public function edit(...$args) {
        return parent::edit(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_SYSTEM_USER_EDIT'))
        ;
    }
    
    public function delete(...$args) {
        return parent::delete(...$args) &&
            ($this->authorizationChecker->isGranted('ROLE_ADMIN') || $this->authorizationChecker->isGranted('ROLE_SYSTEM_USER_DELETE'))
        ;
    }
}
