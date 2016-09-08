<?php

namespace Erp\Bundle\SystemBundle\Model;

use FOS\OAuthServerBundle\Model\ClientInterface as FOSClientInterface;

/**
 */
interface SystemClientInterface extends SystemAccountInterface, FOSClientInterface{
    /**
     * Set secret
     *
     * @param string $secret
     *
     * @return SystemClientInterface
     */
    public function setSecret($secret);

    /**
     * Get secret
     *
     * @return string
     */
    public function getSecret();

    /**
     * Get redirect uris
     *
     * @return string[]
     */
    public function getRedirectUris();

    /**
     * Add redirect uri
     *
     * @param string $allowedGrantType
     *
     * @return SystemClientInterface
     */
    public function addRedirectUri(string $allowedGrantType);

    /**
     * Remove redirect uri
     *
     * @param string $allowedGrantType
     */
    public function removeRedirectUri(string $allowedGrantType);

    /**
     * Set redirect uris
     *
     * @param string[] $redirectUris
     *
     * @return SystemClientInterface
     */
    public function setRedirectUris(array $redirectUris);

    /**
     * Get allowed grant types
     *
     * @return string[]
     */
    public function getAllowedGrantTypes();

    /**
     * Add allowed grant type
     *
     * @param string $allowedGrantType
     *
     * @return SystemClientInterface
     */
    public function addAllowedGrantType(string $allowedGrantType);

    /**
     * Remove allowed grant type
     *
     * @param string $allowedGrantType
     */
    public function removeAllowedGrantType(string $allowedGrantType);

    /**
     * Get allowed grant types
     *
     * @param string[] $allowedGrantTypes
     *
     * @return SystemClientInterface
     */
    public function setAllowedGrantTypes(array $allowedGrantTypes);

    /**
     * Set public_id
     *
     * @param string $public_id
     *
     * @return SystemClientInterface
     */
    public function setPublicId(string $public_id);
}
