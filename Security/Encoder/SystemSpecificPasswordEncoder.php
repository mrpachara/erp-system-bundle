<?php

namespace Erp\Bundle\SystemBundle\Security\Encoder;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

/**
 *
 * @author pachara
 *
 */
class SystemSpecificPasswordEncoder implements PasswordEncoderInterface
{
    private $password;
    /**
     */
    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface::isPasswordValid()
     */
    public function isPasswordValid($encoded, $raw, $salt)
    {
        return !empty($raw) && \hash_equals($this->password, $raw);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface::encodePassword()
     */
    public function encodePassword($raw, $salt)
    {
        return null;
    }
}
