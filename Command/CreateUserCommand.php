<?php

namespace Erp\Bundle\SystemBundle\Command;

use Erp\Bundle\SystemBundle\Entity\SystemUser;
use Erp\Bundle\SystemBundle\Entity\SystemDeep3Account;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('ErpSystem:CreateUser')
            ->setDescription('Create a basic OAuth2 user')
            ->addArgument('username', InputArgument::REQUIRED, 'The users unique username')
            ->addArgument('password', InputArgument::REQUIRED, 'The users password (plaintext)')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $service = $container->get('erp_system.service.system_user');
        $container
            ->get('doctrine')
            ->getConnection()
            ->getConfiguration()
            ->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());

        try {
            $class = $service->getClassName();

            $user = new $class();

            $user->setUsername($input->getArgument('username'));
            $user->setName($input->getArgument('username'));
            $user->setPlainPassword($input->getArgument('password'));
            $password = $container->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //$user->setPassword($input->getArgument('password'));

            //$service->save($user);
            //$em = $container->get('doctrine')->getManager();
            //$em->persist($user);
            //$em->flush();

/*
            $deep3 = new SystemDeep3Account();
            $deep3->setUsername($input->getArgument('username'));
            $deep3->setName($input->getArgument('username'));
            $deep3->setPlainPassword($input->getArgument('password'));
            $password = $container->get('security.password_encoder')->encodePassword($deep3, $deep3->getPlainPassword());
            $deep3->setPassword($password);
            //$deep3->setPassword($input->getArgument('password'));

            $em = $container->get('doctrine')->getManager();
            $em->persist($deep3);
            $em->flush();
*/
        } catch (\Doctrine\DBAL\DBALException $e) {
            $output->writeln('<fg=red>Unable to create user ' . $input->getArgument('username') . '</fg=red>');
            $output->writeln($e->getMessage());

            return;
        }

        $output->writeln('<fg=green>User ' . $input->getArgument('username') . ' created</fg=green>');
    }
}
