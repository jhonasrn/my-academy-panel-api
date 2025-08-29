<?php

namespace App\Controller;

use App\Entity\AdminUser;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AuthController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(
        Request $request,
        EntityManagerInterface $em,
        JWTTokenManagerInterface $jwtManager,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {
        // 📝 Log pra verificar se o controller está rodando
        file_put_contents(
            __DIR__.'/../../../var/log/login_access.log',
            'Controller accessed: ' . date('Y-m-d H:i:s') . PHP_EOL,
            FILE_APPEND
        );

        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (!$email || !$password) {
            throw new UnauthorizedHttpException('', 'Email ou senha não enviados');
        }

        $user = $em->getRepository(AdminUser::class)->findOneBy(['email' => $email]);

        if (!$user || !$passwordHasher->isPasswordValid($user, $password)) {
            return new JsonResponse(['error' => 'Credenciais inválidas'], 401);
        }

        $token = $jwtManager->create($user);

        return new JsonResponse(['token' => $token]);
    }
}
