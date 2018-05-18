<?php

namespace Erp\Bundle\SystemBundle\Infrastructure\ORM\Listener;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Erp\Bundle\SystemBundle\Entity\SystemUser as Entity;

use Erp\Bundle\CoreBundle\Domain\CQRS\GeneratorQuery;

class SystemUserListener {

  public function preFlush(Entity $entity, PreFlushEventArgs $event) {
    if(empty($entity->getId())){
      /**
       * @var \Erp\Bundle\CoreBundle\Entity\Generator
       */
      $generator = $event->getEntityManager()->getRepository("ErpCoreBundle:Generator")->generator('user');
      $entity->setCode($generator->nextValue());
    }
  }
}
