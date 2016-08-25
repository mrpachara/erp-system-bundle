<?php
namespace Erp\Bundle\SystemBundle\Model;

/**
 */
interface SystemUserInterface extends SystemAccountInterface{
    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return SystemUserInterface
     */
    public function setSalt($salt);

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt();

    /**
     * Set password
     *
     * @param string $password
     *
     * @return SystemUserInterface
     */
    public function setPassword($password);

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword();
}
