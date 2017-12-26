<?php

namespace Erp\Bundle\SystemBundle\Command;

use Erp\Bundle\CoreBundle\Model\CoreAccountInterface;
use Erp\Bundle\CoreBundle\Repository\ErpRepositoryInterface;
use Erp\Bundle\SystemBundle\Service\SystemGroupServiceInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
abstract class AbstractAccountCommand extends ContainerAwareCommand{
    /**
     * @var SystemGroupServiceInterface
     */
    private $systemGroupService;

    /**
     * @var bool
     */
    private $readonly = false;

    /**
     * Get Repository Service
     *
     * @return ErpRepositoryInterface
     */
    protected abstract function getReposityService();

    /**
     * Get System group Service
     *
     * @return SystemGroupServiceInterface
     */
    protected function getSystemGroupService(){
        return $this->systemGroupService;
    }

    /**
     * Is read-only entity
     *
     * @return bool
     */
    protected function isReadonly(){
        return $this->readonly;
    }

    protected function configure(){
        $this->setDefinition(new InputDefinition([
            new InputOption('list', null, InputOption::VALUE_NONE, "List all data"),
            new InputOption('update', null, InputOption::VALUE_NONE, "For update"),

            new InputOption('role', 'r', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The role of account (+/-)"),
            new InputOption('group', 'g', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The group of account (+/-)"),

            new InputArgument('code', InputArgument::OPTIONAL, 'The unique account code'),
            new InputArgument('name', InputArgument::OPTIONAL, 'The full-name of account'),
        ]));
    }

    /**
     * Preprocess executation
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return CoreAccountInterface
     */
    protected function preprocess(InputInterface $input, OutputInterface $output){
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

        $entity = null;
        $repositoryService = $this->getReposityService();
        if($input->getOption('list')){
            $this->readonly = true;
            return $repositoryService->findAll();
        } else{
            if(empty($input->getArgument('code'))){
                throw new \Exception('code required!!!');
            }

            if($input->getOption('update')){
                $entity = $repositoryService->findOneByCode($input->getArgument('code'));

                if(!empty($input->getArgument('name'))) $entity->setName($input->getArgument('name'));
            } else{
                $className = $repositoryService->getClassName();
                $entity = new $className();

                $entity->setCode($input->getArgument('code'));
                $entity->setName(empty($input->getArgument('name'))? $input->getArgument('code') : $input->getArgument('name'));
            }

            foreach((array)$input->getOption('role') as $roles){
                foreach(preg_split("/[\s,]+/", $roles) as $role){
                    if(!empty($role)){
                        $isremove = false;
                        if($role[0] === '-') $isremove = true;
                        if($isremove || ($role[0] === '+')) $role = substr($role, 1);

                        if($isremove){
                            $entity->removeIndividualRole($role);
                        } else{
                            $entity->addIndividualRole($role);
                        }
                    }
                }
            }

            foreach((array)$input->getOption('group') as $groups){
                foreach(preg_split("/[\s,]+/", $groups) as $group){
                    if(!empty($group)){
                        $isremove = false;
                        if($group[0] === '-') $isremove = true;
                        if($isremove || ($group[0] === '+')) $group = substr($group, 1);

                        $systemGroup = $this->getSystemGroupService()->findOneByCode($group);
                        if(empty($systemGroup)) throw new \Exception("System group '{$group}' not Found.");

                        if($isremove){
                            $entity->removeSystemGroup($systemGroup);
                        } else{
                            $entity->addSystemGroup($systemGroup);
                        }
                    }
                }
            }

            return $entity;
        }
    }
}
