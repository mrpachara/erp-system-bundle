<?php
namespace Erp\Bundle\SystemBundle\Security\Voter;

use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Erp\Bundle\SystemBundle\Entity\SystemUser;

/**
 *
 * @author pachara
 *        
 */
class RootRoleVoter extends Voter
{
    private $prefix;
    
    
    /**
     * @param string $prefix The role prefix
     */
    public function __construct($prefix = 'ROLE_')
    {
        $this->prefix = $prefix;
    }
    
    /**
     * {@inheritdoc}
     *
     * @see \Symfony\Component\Security\Core\Authorization\Voter\Voter::supports()
     */
    protected function supports($attribute, $subject)
    {
        if ($attribute instanceof RoleInterface) {
            $attribute = $attribute->getRole();
        }
        
        if (!is_string($attribute) || 0 !== strpos($attribute, $this->prefix)) {
            return false;
        }
        
        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Symfony\Component\Security\Core\Authorization\Voter\Voter::voteOnAttribute()
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        
        if($user instanceof SystemUser) {
            return 'root' === $user->getUsername();
        }
        
        return false;
    }
}

