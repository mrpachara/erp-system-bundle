<?php

namespace Erp\Bundle\SystemBundle\Service;

use FOS\OAuthServerBundle\Model\ClientManagerInterface as FOSClientManagerInterface;

/**
 * System client Service Interface
 */
interface SystemClientServiceInterface extends SystemAccountServiceInterface, FOSClientManagerInterface{
}
