<?php

namespace Erp\Bundle\SystemBundle\Command;

use Erp\Bundle\CoreBundle\Model\CoreAccountInterface;
use Erp\Bundle\SystemBundle\Service\SystemGroupServiceInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCreateAccountCommand extends ContainerAwareCommand{
    /**
     * @var SystemGroupServiceInterface
     */
    private $systemGroupService;

    /**
     * Get System group Service
     *
     * @return SystemGroupServiceInterface
     */
    protected function getSystemGroupService(){
        return $this->systemGroupService;
    }

    /**
     * Set code, name, roles and groups for Entity
     *
     * @param CoreAccountInterface $entity
     * @param InputInterface $input
     */
    protected function setAccountProperty(CoreAccountInterface $entity, InputInterface $input){
        $entity->setCode($input->getArgument('code'));
        $entity->setName(empty($input->getArgument('name'))? $input->getArgument('code') : $input->getArgument('name'));

        foreach((array)$input->getOption('role') as $role){
            if(!empty($role)) $entity->addIndividualRole($role);
        }

        foreach((array)$input->getOption('group') as $group){
            if(!empty($group)){
                $systemGroup = $this->getSystemGroupService()->findOneByCode($group);
                if(empty($systemGroup)) throw new \Exception("System group '{$group}' not Found.");

                $entity->addSystemGroup($systemGroup);
            }
        }

    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $this->systemGroupService = $this->getContainer()->get('erp_system.service.system_group');

        foreach($input->getArguments() as $key => $value){
            if("~" === $value){
                $input->setArgument($key, null);
            }
        }

        if($output->isVerbose()){
            $this->getContainer()
                ->get('doctrine')
                ->getConnection()
                ->getConfiguration()
                ->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger())
            ;
        }
    }
}
