<?php

namespace Erp\Bundle\SystemBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

/**
 */
interface SystemUserInterface extends SystemAccountInterface, SymfonyUserInterface{
    /**
     * Set username
     *
     * @param string $username
     *
     * @return SystemUserInterface
     */
    public function setUsername(string $username);

    /**
     * Set password
     *
     * @param string $password
     *
     * @return SystemUserInterface
     */
    public function setPassword(string $password);

    /**
     * Set plain password
     *
     * @param string $plainPassword
     *
     * @return SystemUserInterface
     */
    public function setPlainPassword(string $plainPassword);

    /**
     * Get plain password
     *
     * @return string
     */
    public function getPlainPassword();
}
