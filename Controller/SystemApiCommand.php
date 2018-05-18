<?php

namespace Erp\Bundle\SystemBundle\Controller;

use Erp\Bundle\CoreBundle\Controller\CoreAccountApiCommand;

/**
 * System Api Command
 */
abstract class SystemApiCommand extends CoreAccountApiCommand
{
    /**
     * @var \Erp\Bundle\SystemBundle\Authorization\AbstractSystemAuthorization
     */
    protected $authorization = null;

    // /**
    //  * @var \Erp\Bundle\SystemBundle\Domain\CQRS\SystemCommandHandler
    //  */
    // protected $commandHandler;
    //
    // /** @required */
    // public function setCommandHandler(\Erp\Bundle\SystemBundle\Domain\CQRS\SystemCommandHandler $commandHandler)
    // {
    //     $this->commandHandler = $commandHandler;
    // }
}
