<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\SystemBundle\Model\SystemAccountRoleInterface;
use Erp\Bundle\SystemBundle\Model\SystemGroupInterface;

use Erp\Bundle\SystemBundle\Model\SystemAccountInterface;
use Erp\Bundle\SystemBundle\Model\SystemAccountBaseInterface;

/**
 * @ORM\MappedSuperclass
 */
class SystemAccountBase implements SystemAccountInterface, SystemAccountBaseInterface{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var string
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="SystemAccount", cascade={"persist"})
     * @ORM\JoinColumn(name="id_account", nullable=false, onDelete="cascade")
     *
     * @var SysetmAccountInterface
     */
    private $account;

    public function __construct(){
        parent::__construct();
        $this->account = new SystemAccount();
    }

    public function getId(){
        return $this->id;
    }

    public function setCode(string $code){
        $this->account->setCode($code);

        return $this;
    }

    public function getCode(){
        return $this->account->getCode();
    }

    public function setName(string $name){
        $this->setName($name);

        return $this;
    }

    public function getName(){
        return $this->account->getName();
    }

    public function setSystemAccount(SystemAccountInterface $account){
        $this->account = $account;

        return $this;
    }

    public function getSystemAccount(){
        return $this->account;
    }

    public function addSystemAccountRole(SystemAccountRoleInterface $role){
        $this->account->addSystemAccountRole($role);

        return $this;
    }

    public function removeSystemAccountRole(SystemAccountRoleInterface $role){
        $this->account->removeSystemAccountRole($role);
    }

    public function getSystemAccountRoles(){
        return $this->account->getSystemAccountRoles();
    }

    public function addSystemGroup(SystemGroupInterface $group){
        $this->account->addSystemGroup($group);

        return $this;
    }

    public function removeSystemGroup(SystemGroupInterface $group){
        $this->account->removeSystemGroup($group);
    }

    public function getSystemGroups(){
        return $this->account->getSystemGroups();
    }
}
