<?php
namespace Erp\Bundle\SystemBundle\Model;

/**
 * System user Trait
 */
trait SystemUserTrait{
    public function setSalt(string $salt){
        $this->salt = $salt;

        return $this;
    }

    public function getSalt(){
        return $this->salt;
    }

    public function setPassword(string $password){
        $this->password = $password;

        return $this;
    }

    public function getPassword(){
        return $this->password;
    }
}
