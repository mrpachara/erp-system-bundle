<?php

namespace Erp\Bundle\SystemBundle\Controller;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\RestBundle\Controller\Annotations as Rest;
use Erp\Bundle\CoreBundle\Controller\CQRSCommandApi;

/**
 * CoreAccount Api Controller
 *
 * @Rest\Version("1.0")
 * @Rest\Route("/api/systemuser")
 */
class SystemUserCommandApiController extends CQRSCommandApi{
  /**
   * @var \Erp\Bundle\CoreBundle\Domain\CQRS\CQRSContainer
   *
   * @DI\Inject("erp_system.cqrs.system_user")
   */
  protected $cqrs;
}
