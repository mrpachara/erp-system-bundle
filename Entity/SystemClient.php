<?php
namespace Erp\Bundle\SystemBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Erp\Bundle\SystemBundle\Model\SystemClientInterface;
use FOS\OAuthServerBundle\Model\ClientInterface as FOSClientInterface;

use Erp\Bundle\SystemBundle\Model\SystemClientTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="system.client")
 */
class SystemClient extends SystemAccount implements SystemClientInterface, FOSClientInterface{
    use SystemClientTrait;

    /**
     * @ORM\Column(type="string", length=128)
     *
     * @var string
     */
    private $secret;

    /**
     * constructor
     */
    public function __construct() {
        parent::__construct();
    }
}
