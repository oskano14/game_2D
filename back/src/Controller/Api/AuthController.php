<?php

namespace App\Controller\Api;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{
    #[Route('/api/login', methods: ['POST'])]
    public function login(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['email'], $data['password'])) {
            return $this->json(['error' => 'Missing credentials'], 400);
        }

        $user = $em->getRepository(Users::class)->findOneBy(['email' => $data['email']]);

        if (!$user || !password_verify($data['password'], $user->getPasswordHash())) {
            return $this->json(['error' => 'Invalid email or password'], 401);
        }

        return $this->json([
            'user_id' => $user->getId(),
            'email' => $user->getEmail()
        ]);
    }

    #[Route('/api/register', methods: ['POST'])]
    public function register(Request $request, EntityManagerInterface $em): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);

            if (!isset($data['email'], $data['password'])) {
                return $this->json(['error' => 'Missing fields'], 400);
            }

            $existing = $em->getRepository(Users::class)->findOneBy(['email' => $data['email']]);
            if ($existing) {
                return $this->json(['error' => 'Email already registered'], 409);
            }

            $user = new Users();
            $user->setEmail($data['email']);
            $user->setPasswordHash(password_hash((string) $data['password'], PASSWORD_BCRYPT));
            $user->setCreatedAt(new \DateTime());

            $em->persist($user);
            $em->flush();

            return $this->json([
                'message' => 'User registered',
                'user_id' => $user->getId()
            ]);
        } catch (\Throwable $e) {
            return $this->json(['error' => $e->getMessage()], 500);
        }
    }
}
