<?php
namespace Erp\Bundle\SystemBundle\Service;

use FOS\OAuthServerBundle\Entity\ClientManager;

/**
 */
class SystemClientService extends ClientManagerInterface{
    public function findClientByPublicId($publicId)
    {
        return $this->findClientBy([
            'code'       => $publicId,
        ]);
    }
}
