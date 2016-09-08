<?php

namespace Erp\Bundle\SystemBundle\Model;

/**
 * System client Trait
 */
trait SystemClientTrait{
    /**
     * @inheritDoc
     */
    public function setSecret($secret){
        $this->secret = $secret;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSecret(){
        return $this->secret;
    }

    /**
     * @inheritDoc
     */
    public function setPublicId(string $public_id){
        return $this->setCode($public_id);
    }

    /*
     * FOSClientInterface
     */

    /**
     * @inheritDoc
     */
    public function setRandomId($random){
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRandomId(){
        return null;
    }

    /**
     * @inheritDoc
     */
    public function checkSecret($secret){
        return null === $this->secret || $secret === $this->secret;
    }

    /**
     * @inheritDoc
     */
    public function addRedirectUri(string $redirectUri){
        if(!in_array($redirectUri, $this->redirectUris)) $this->redirectUris[] = $redirectUri;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeRedirectUri(string $redirectUri){
        unset($this->redirectUri[array_search($redirectUri, $this->redirectUri)]);
    }

    /**
     * @inheritDoc
     */
    public function setRedirectUris(array $redirectUris){
        $this->redirectUris = $redirectUris;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAllowedGrantTypes(){
        return $this->allowedGrantTypes;
    }

    /**
     * @inheritDoc
     */
    public function addAllowedGrantType(string $allowedGrantType){
        if(!in_array($allowedGrantType, $this->allowedGrantTypes)) $this->allowedGrantTypes[] = $allowedGrantType;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeAllowedGrantType(string $allowedGrantType){
        unset($this->allowedGrantTypes[array_search($allowedGrantType, $this->allowedGrantTypes)]);
    }

    /**
     * @inheritDoc
     */
    public function setAllowedGrantTypes(array $allowedGrantTypes){
        $this->allowedGrantTypes = $allowedGrantTypes;

        return $this;
    }

    /*
     * IOAuth2Client
     */

     /**
      * @inheritDoc
      */
    public function getPublicId(){
        return $this->getCode();
    }

    /**
     * @inheritDoc
     */
    public function getRedirectUris(){
        // TODO implement this method
        return null;
    }
}
