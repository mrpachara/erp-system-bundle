<?php

namespace Erp\Bundle\SystemBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class UserCommand extends AbstractAccountCommand{
    protected function getReposityService(){
        return $this->getContainer()->get('erp_system.service.system_user');
    }

    protected function configure(){
        parent::configure();

        $this
            ->setName('ErpSystem:User')
            ->setDescription('Create a basic OAuth2 user')
        ;

        $this->getDefinition()->addArguments([
            new InputArgument('password', InputArgument::OPTIONAL, 'The users password (plaintext)'),
        ]);
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        try {
            if(!$input->getOption('list') && !$input->getOption('update') && empty($input->getArgument('password'))){
                throw new \Exception('password required!!!');
            }

            $entity = $this->preprocess($input, $output);

            if($this->isReadonly()){
                $serializer = $this->getContainer()->get('jms_serializer');
                $result = json_encode(json_decode($serializer->serialize($entity, 'json')), JSON_PRETTY_PRINT);
                $output->writeln($result);
            } else{
                if(!empty($input->getArgument('password'))){
                    $entity->setPlainPassword($input->getArgument('password'));
                    $password = $this->getContainer()->get('security.password_encoder')->encodePassword($entity, $entity->getPlainPassword());
                    $entity->setPassword($password);
                }

                $this->getReposityService()->save($entity);

                $output->writeln('<fg=green>User ' . $entity->getCode() . ' created</fg=green>');
            }
        } catch (\Doctrine\DBAL\DBALException $e){
            $output->writeln('<fg=red>Unable to create user ' . $input->getArgument('code') . '</fg=red>');
            $output->writeln('<fg=red>'.$e->getMessage().'</fg=red>');

            return;
        }
    }
}
