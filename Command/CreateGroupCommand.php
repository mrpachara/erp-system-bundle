<?php

namespace Erp\Bundle\SystemBundle\Command;

use Erp\Bundle\SystemBundle\Command\AbstractCreateAccountCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Output\OutputInterface;

class CreateGroupCommand extends AbstractCreateAccountCommand{
    protected function configure(){
        $this
            ->setName('ErpSystem:CreateGroup')
            ->setDescription('Create a basic OAuth2 client')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('role', 'r', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The role of account"),
                    new InputOption('group', 'g', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The group of account"),

                    new InputArgument('code', InputArgument::REQUIRED, 'The group code'),
                    new InputArgument('name', InputArgument::OPTIONAL, 'The full-name of group'),
                ])
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        parent::execute($input, $output);

        try {
            $service = $this->getContainer()->get('erp_system.service.system_group');
            $class = $service->getClassName();
            $entity = new $class();

            $this->setAccountProperty($entity, $input);

            $service->save($entity);

            $output->writeln('<fg=green>Group ' . $entity->getCode() . ' created</fg=green>');
        } catch (\Doctrine\DBAL\DBALException $e){
            $output->writeln('<fg=red>Unable to create group ' . $input->getArgument('code') . '</fg=red>');
            $output->writeln('<fg=red>'.$e->getMessage().'</fg=red>');

            return;
        }
    }
}
