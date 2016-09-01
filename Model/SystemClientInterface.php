<?php

namespace Erp\Bundle\SystemBundle\Model;

/**
 */
interface SystemClientInterface extends SystemAccountInterface{
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
}
