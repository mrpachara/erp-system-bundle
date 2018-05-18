<?php

namespace Erp\Bundle\SystemBundle\Command;

use Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand;

use Erp\Bundle\SystemBundle\Entity\SystemAccount;
use Erp\Bundle\SystemBundle\Domain\CQRS\SystemAccountQuery;
use Erp\Bundle\SystemBundle\Domain\CQRS\SystemGroupQuery;
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
     * @var bool
     */
    protected $readonly = false;

    protected $query;

    /**
     * Get Query Service
     *
     * @return SystemAccountQuery
     */
    protected function getQuery()
    {
        return $this->query;
    }

    protected $simpleCommand;

    /** @required */
    public function setSimpleCommand(\Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand $simpleCommand)
    {
        $this->simpleCommand = $simpleCommand;
    }

    /**
     * Get Command Service
     *
     * @return SimpleCommand
     */
    protected function getCommand() {
        //return $this->getContainer()->get('Erp\Bundle\CoreBundle\Domain\CQRS\SimpleCommand');
        return $this->simpleCommand;
    }

    /**
     * Get System group Service
     *
     * @return SystemGroupQuery
     */
    protected function getSystemGroupQuery(){
        return $this->getContainer()->get('Erp\Bundle\SystemBundle\Domain\CQRS\SystemGroupQuery');
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

            new InputArgument('systemId', InputArgument::OPTIONAL, 'The unique system ID'),
            new InputArgument('name', InputArgument::OPTIONAL, 'The full-name of account'),
        ]));
    }

    /**
     * Preprocess executation
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return SystemAccount
     */
    protected function preprocess(InputInterface $input, OutputInterface $output){
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
        $query = $this->getQuery();
        if($input->getOption('list')){
            $this->readonly = true;
            return $query->findAll();
        } else{
            if(empty($input->getArgument('systemId'))){
                throw new \Exception('systemId required!!!');
            }

            if($input->getOption('update')){
                $entity = $query->findOneBySystemId($input->getArgument('systemId'));

                if(!empty($input->getArgument('name'))) $entity->setName($input->getArgument('name'));
            } else{
                $className = $query->getClassName();
                $entity = new $className();

                $entity->setSystemId($input->getArgument('systemId'));
                $entity->setName(empty($input->getArgument('name'))? $input->getArgument('systemId') : $input->getArgument('name'));
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
