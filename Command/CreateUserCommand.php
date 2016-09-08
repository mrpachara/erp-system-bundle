<?php

namespace Erp\Bundle\SystemBundle\Command;

use Erp\Bundle\SystemBundle\Command\AbstractCreateAccountCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends AbstractCreateAccountCommand{
    protected function configure(){
        $this
            ->setName('ErpSystem:CreateUser')
            ->setDescription('Create a basic OAuth2 user')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('role', 'r', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The role of account"),
                    new InputOption('group', 'g', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The group of account"),

                    new InputArgument('code', InputArgument::REQUIRED, 'The users unique username'),
                    new InputArgument('password', InputArgument::REQUIRED, 'The users password (plaintext)'),
                    new InputArgument('name', InputArgument::OPTIONAL, 'The full-name of user')
                ])
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        parent::execute($input, $output);

        try {
            $service = $this->getContainer()->get('erp_system.service.system_user');
            $class = $service->getClassName();
            $entity = new $class();

            $this->setAccountProperty($entity, $input);

            $entity->setPlainPassword($input->getArgument('password'));
            $password = $this->getContainer()->get('security.password_encoder')->encodePassword($entity, $entity->getPlainPassword());
            $entity->setPassword($password);

            $service->save($entity);

            $output->writeln('<fg=green>User ' . $entity->getCode() . ' created</fg=green>');
        } catch (\Doctrine\DBAL\DBALException $e){
            $output->writeln('<fg=red>Unable to create user ' . $input->getArgument('code') . '</fg=red>');
            $output->writeln('<fg=red>'.$e->getMessage().'</fg=red>');

            return;
        }
    }
}
