<?php

namespace Erp\Bundle\SystemBundle\Model;

use JMS\Serializer\Annotation as JMSSerializer;

/**
 * System user Trait
 */
trait SystemUserTrait{
    /**
     * @var bool
     */
    protected $credentialErased = false;

    /**
     * @inheritDoc
     */
    abstract public function setCode(string $code);

    /**
     * @inheritDoc
     */
    abstract public function getCode();

    /**
     * @inheritDoc
     */
    public function getSalt(){
        return null;
    }

    /**
     * @inheritDoc
     */
    public function setPassword(string $password){
        $this->password = $password;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPassword(){
        return ($this->credentialErased)? null : $this->password;
    }

    /**
     * @inheritDoc
     */
    public function setUsername(string $username){
        return $this->setCode($username);
    }

    /**
     * @inheritDoc
     *
     * @JMSSerializer\VirtualProperty
     */
    public function getUsername(){
        return $this->getCode();
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials(){
        $this->credentialErased = true;
        $this->setPlainPassword(null);
    }

    /**
     * @inheritDoc
     */
    public function setPlainPassword(string $plainPassword = null){
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @inheritDoc
     *
     * @JMSSerializer\VirtualProperty
     */
    public function getPlainPassword(){
        return $this->plainPassword;
    }
}
