<?php

namespace Erp\Bundle\SystemBundle\Entity;

use FOS\OAuthServerBundle\Model\ClientInterface as FOSClientInterface;

use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * System Client Entity
 */
class SystemClient extends SystemAccount implements
    FOSClientInterface{
    /**
     * @var string
     */
    protected $secret;

    /**
     * @var array
     */
    protected $redirectUris;

    /**
     * @var array
     */
    protected $allowedGrantTypes;

    /**
     * constructor
     *
     * @param Thing $thing
     */
    public function __construct(Thing $thing = null) {
        parent::__construct($thing);
        $this->redirectUris = [];
        $this->allowedGrantTypes = [];
    }

    /**
     * Set public_id
     *
     * @param string $public_id
     *
     * @return SystemClient
     */
    public function setPublicId($public_id){
        return $this->setCode($public_id);
    }

    /**
     * Add redirect uri
     *
     * @param string $redirectUri
     *
     * @return SystemClient
     */
    public function addRedirectUri(string $redirectUri){
        if(!in_array($redirectUri, $this->redirectUris)) $this->redirectUris[] = $redirectUri;

        return $this;
    }

    /**
     * Remove redirect uri
     *
     * @param string $redirectUri
     */
    public function removeRedirectUri(string $redirectUri){
        unset($this->redirectUri[array_search($redirectUri, $this->redirectUri)]);
    }

    /**
     * Add allowed grant type
     *
     * @param string $allowedGrantType
     *
     * @return SystemClient
     */
    public function addAllowedGrantType(string $allowedGrantType){
        if(!in_array($allowedGrantType, $this->allowedGrantTypes)) $this->allowedGrantTypes[] = $allowedGrantType;

        return $this;
    }

    /**
     * Remove allowed grant type
     *
     * @param string $allowedGrantType
     */
    public function removeAllowedGrantType(string $allowedGrantType){
        unset($this->allowedGrantTypes[array_search($allowedGrantType, $this->allowedGrantTypes)]);
    }

    /*
     * FOSClientInterface
     */

     /**
      * Get Random ID
      *
      * @return string
      */
     public function getRandomId(){
         return null;
     }

     /**
      * Set Random ID
      *
      * @param string $random
      *
      * @return SystemClient
      */
    public function setRandomId($random){
        return $this;
    }

    /**
     * Get secret
     *
     * @return string
     */
    public function getSecret(){
        return $this->secret;
    }

    /**
     * Set secret
     *
     * @param string $secret
     *
     * @return SystemClient
     */
    public function setSecret($secret){
        $this->secret = $secret;

        return $this;
    }

    /**
     * Check if secret match
     *
     * @param string $secret
     *
     * @return bool
     */
    public function checkSecret($secret){
        return null === $this->secret || $secret === $this->secret;
    }

    /**
     * Set Redirect URIs
     *
     * @param array $redirectUris
     *
     * @return SystemClient
     */
    public function setRedirectUris(array $redirectUris){
        $this->redirectUris = $redirectUris;

        return $this;
    }

    /**
     * Get Allowed Grant Types
     *
     * @return array
     */
    public function getAllowedGrantTypes(){
        return $this->allowedGrantTypes;
    }

    /**
     * Set allowed grant types
     *
     * @param string[] $allowedGrantTypes
     *
     * @return SystemClient
     */
    public function setAllowedGrantTypes(array $allowedGrantTypes){
        $this->allowedGrantTypes = $allowedGrantTypes;

        return $this;
    }

    /*
     * IOAuth2Client
     */

     /**
      * Get Public ID
      *
      * @return string
      */
    public function getPublicId(){
        return $this->getCode();
    }

    /**
     * Get Redirect URIs
     *
     * @return array
     */
    public function getRedirectUris(){
        // TODO implement this method
        return null;
    }
}
