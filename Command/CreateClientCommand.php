<?php

namespace Erp\Bundle\SystemBundle\Command;

use Erp\Bundle\SystemBundle\Command\AbstractCreateAccountCommand;
use FOS\OAuthServerBundle\Util\Random;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Output\OutputInterface;

class CreateClientCommand extends AbstractCreateAccountCommand{
    protected function configure(){
        $this
            ->setName('ErpSystem:CreateClient')
            ->setDescription('Create a basic OAuth2 client')
            ->setDefinition(
                new InputDefinition([
                    new InputOption('role', 'r', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The role of account"),
                    new InputOption('group', 'g', InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, "The group of account"),

                    new InputArgument('code', InputArgument::REQUIRED, 'The client unique id'),
                    new InputArgument('name', InputArgument::OPTIONAL, 'The full-name of client'),
                    new InputArgument('secret', InputArgument::OPTIONAL, 'The sepecific secret of client'),

                    new InputArgument('allowed-grant-types', InputArgument::OPTIONAL, "The allowed grant type of client (comma separeted)"),
                    new InputArgument('redirect-uris', InputArgument::OPTIONAL, "The redirect URL of client (comma separeted)"),
                ])
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        parent::execute($input, $output);

        try {
            $service = $this->getContainer()->get('erp_system.service.system_client');
            $class = $service->getClassName();
            $entity = new $class();

            $this->setAccountProperty($entity, $input);

            $entity->setSecret(empty($input->getArgument('secret'))? Random::generateToken() : $input->getArgument('secret'));

            $service->save($entity);

            $output->writeln('<fg=green>Client ' . $entity->getCode() . ' with secret ' . $entity->getSecret() . ' created</fg=green>');
        } catch (\Doctrine\DBAL\DBALException $e){
            $output->writeln('<fg=red>Unable to create client ' . $input->getArgument('code') . '</fg=red>');
            $output->writeln('<fg=red>'.$e->getMessage().'</fg=red>');

            return;
        }
    }
}
