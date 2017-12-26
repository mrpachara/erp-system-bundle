<?php

namespace Erp\Bundle\SystemBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

use Erp\Bundle\CoreBundle\Entity\Thing;

/**
 * System User Entity
 */
class SystemUser extends SystemAccount implements SymfonyUserInterface{
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
     * constructor
     *
     * @param Thing $thing
     */
    public function __construct(Thing $thing = null) {
        parent::__construct($thing);
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return SystemUser
     */
    public function setUsername(string $username){
        return $this->setCode($username);
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return SystemUser
     */
    public function setPassword(string $password){
        $this->password = $password;

        return $this;
    }

    /**
     * Get plain password
     *
     * @return string
     */
    public function getPlainPassword(){
        return $this->plainPassword;
    }

    /**
    * Set plain password
    *
    * @param string $plainPassword
    *
    * @return SystemUser
     */
    public function setPlainPassword(string $plainPassword = null){
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /*
     * SymfonyUserInterface
     */

    public function getUsername(){
       return $this->getCode();
    }

    public function getSalt(){
     return null;
    }

    public function getPassword(){
       return ($this->credentialErased)? null : $this->password;
    }

    public function eraseCredentials(){
       $this->credentialErased = true;
       $this->setPlainPassword(null);
    }
}
