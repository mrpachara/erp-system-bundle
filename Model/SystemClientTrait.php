<?php

namespace Erp\Bundle\SystemBundle\Model;

/**
 * System client Trait
 */
trait SystemClientTrait{
    public function setSecret($secret){
        $this->secret = $secret;

        return $this;
    }

    public function getSecret(){
        return $this->secret;
    }

    /*
     * FOSClientInterface
     */

    public function setRandomId($random){
        return $this;
    }

    public function getRandomId(){
        return null;
    }

    public function checkSecret($secret){
        return null === $this->secret || $secret === $this->secret;
    }

    public function setRedirectUris(array $redirectUris){
        // TODO implement this method
        return $this;
    }

    public function setAllowedGrantTypes(array $grantTypes){
        // TODO implement this method
        return $this;
    }

    public function getAllowedGrantTypes(){
        // TODO implement this method
        return null;
    }

    /*
     * IOAuth2Client
     */

    public function getPublicId(){
        return $this->getCode();
    }

    public function getRedirectUris(){
        // TODO implement this method
        return null;
    }
}
