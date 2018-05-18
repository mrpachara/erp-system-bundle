<?php

namespace Erp\Bundle\SystemBundle\Command;

use FOS\OAuthServerBundle\Util\Random;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class ClientCommand extends AbstractAccountCommand{
    protected function getQuery(){
        return $this->getContainer()->get('erp_system.service.query.system_group');
    }

    protected function configure(){
        parent::configure();

        $this
            ->setName('ErpSystem:Client')
            ->setDescription('Create a basic OAuth2 client')
        ;

        $this->getDefinition()->addArguments([
            new InputArgument('secret', InputArgument::OPTIONAL, 'The sepecific secret of client'),

            new InputArgument('allowed-grant-types', InputArgument::OPTIONAL, "The allowed grant type of client (comma separeted)"),
            new InputArgument('redirect-uris', InputArgument::OPTIONAL, "The redirect URL of client (comma separeted)"),
        ]);
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        try {
            $entity = $this->preprocess($input, $output);

            if($this->isReadonly()){
                $serializer = $this->getContainer()->get('jms_serializer');
                $result = json_encode(json_decode($serializer->serialize($entity, 'json')), JSON_PRETTY_PRINT);
                $output->writeln($result);
            } else{
                if($input->getOption('update') && empty($input->getArgument('secret'))){
                    $input->setArgument('secret', $entity->getSecret());
                }

                $entity->setSecret(empty($input->getArgument('secret'))? Random::generateToken() : $input->getArgument('secret'));

                foreach(preg_split("/[\s,]+/", $input->getArgument('allowed-grant-types')) as $value){
                    if(!empty($value)) $entity->addAllowedGrantType($value);
                }

                foreach(preg_split("/[\s,]+/", $input->getArgument('redirect-uris')) as $value){
                    if(!empty($value)) $entity->addRedirectUri($value);
                }

                $this->getCommand()->save($entity);

                $output->writeln('<fg=green>Client ' . $entity->getCode() . ' with secret ' . $entity->getSecret() . ' created</fg=green>');
            }
        } catch (\Doctrine\DBAL\DBALException $e){
            $output->writeln('<fg=red>Unable to create client ' . $input->getArgument('code') . '</fg=red>');
            $output->writeln('<fg=red>'.$e->getMessage().'</fg=red>');

            return;
        }
    }
}
