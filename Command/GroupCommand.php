<?php

namespace Erp\Bundle\SystemBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class GroupCommand extends AbstractAccountCommand{
    protected function getQuery(){
        return $this->getContainer()->get('erp_system.service.system_group');
    }

    protected function configure(){
        parent::configure();

        $this
            ->setName('ErpSystem:Group')
            ->setDescription('Create a basic OAuth2 client')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        try {
            $entity = $this->preprocess($input, $output);

            if($this->isReadonly()){
                $serializer = $this->getContainer()->get('jms_serializer');
                $result = json_encode(json_decode($serializer->serialize($entity, 'json')), JSON_PRETTY_PRINT);
                $output->writeln($result);
            } else{
                $this->getReposityService()->save($entity);

                $output->writeln('<fg=green>Group ' . $entity->getCode() . ' created</fg=green>');
            }
        } catch (\Doctrine\DBAL\DBALException $e){
            $output->writeln('<fg=red>Unable to create group ' . $input->getArgument('code') . '</fg=red>');
            $output->writeln('<fg=red>'.$e->getMessage().'</fg=red>');

            return;
        }
    }
}
