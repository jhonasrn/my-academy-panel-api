<?php

namespace App\Command;

use App\Entity\AdminUser;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:test-jwt',
    description: 'Testa a geração de token JWT'
)]
class TestJwtCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $em,
        private JWTTokenManagerInterface $jwtManager
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $user = $this->em->getRepository(AdminUser::class)
                         ->findOneBy(['email' => 'admin@academy.com']);

        if (!$user) {
            $output->writeln('<error>Usuário não encontrado</error>');
            return Command::FAILURE;
        }

        $token = $this->jwtManager->create($user);

        $output->writeln('<info>Token gerado com sucesso:</info>');
        $output->writeln($token);

        return Command::SUCCESS;
    }
}
