<?php

namespace App\Controller\Api;

use App\Entity\Characters;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpFoundation\Request;



class GameController extends AbstractController
{
  
    #[Route('/api/character/{user_id}', methods: ['GET'])]
    public function getCharacters(EntityManagerInterface $em, int $user_id): JsonResponse
    {
        $characters = $em->getRepository(Characters::class)->findBy(['user' => $user_id]);


        $data = array_map(fn($c) => [
            'id' => $c->getId(),
            'name' => $c->getName(),
            'health' => $c->getHealth(),
            'level' => $c->getLevel(),
            'position_x' => $c->getPositionX(),
            'position_y' => $c->getPositionY(),
        ], $characters);

        return $this->json($data);
    }

   
    #[Route('/api/progress', methods: ['POST'])]
    public function saveProgress(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['character_id'], $data['event_name'], $data['completed'])) {
            return $this->json(['error' => 'Missing fields'], 400);
        }

        $progress = new \App\Entity\Progress();
        $progress->setCharacterId($data['character_id']);
        $progress->setEventName($data['event_name']);
        $progress->setCompleted($data['completed']);

        $em->persist($progress);
        $em->flush();

        return $this->json(['status' => 'progress saved']);
    }
}
