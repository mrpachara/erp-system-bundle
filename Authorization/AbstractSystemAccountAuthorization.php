<?php

namespace Erp\Bundle\SystemBundle\Authorization;

abstract class AbstractSystemAccountAuthorization extends AbstractSystemAuthorization
{
    public function list(...$args) {
        return parent::list(...$args) &&
            $this->specialRole('list', ...$args)
        ;
    }
    
    public function get(...$args) {
        return parent::get(...$args) &&
            $this->specialRole('get', ...$args)
        ;
    }
    
    public function add(...$args) {
        return parent::add(...$args) &&
            $this->specialRole('add', ...$args)
        ;
    }
    
    public function edit(...$args) {
        return parent::edit(...$args) &&
            $this->specialRole('edit', ...$args)
        ;
    }
    
    public function delete(...$args) {
        return parent::delete(...$args) &&
            $this->specialRole('delete', ...$args)
        ;
    }
    
    protected function specialRole($type, $item = null) {
        if(empty($item)) {
            return true;
        }
        
        if($item->getSystemId() === 'root') {
            return false;
        }
        
        if($item->getSystemId() === 'admin') {
            if(($type === 'add') || ($type === 'delete')) {
                return false;
            }
            
            if($type === 'edit') {
                return $this->authorizationChecker->isGranted('ROLE_ADMIN');
            }
        }
        
        return true;
    }
}
