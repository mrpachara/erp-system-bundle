<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * System User Entity
 */
class SystemUser extends SystemAccount implements SymfonyUserInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     *
     * @var string
     */
    protected $plainPassword;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var bool
     */
    protected $credentialErased = false;

    /**
     * constructor
     *
     * @param Thing $thing
     */
    public function __construct(Thing $thing = null)
    {
        parent::__construct($thing);
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return static
     */
    public function setUsername(string $username)
    {
        return $this->setSystemId($username);
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return static
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get plain password
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
    * Set plain password
    *
    * @param string $plainPassword
    *
    * @return SystemUser
     */
    public function setPlainPassword(string $plainPassword = null)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**************************
     * SymfonyUserInterface
     **************************/

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {
        return $this->getSystemId();
    }

    /**
     * {@inheritDoc}
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {
        return ($this->credentialErased)? null : $this->password;
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials()
    {
        $this->credentialErased = true;
        $this->setPlainPassword(null);
    }
}
