<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class EmailValidationController extends AbstractController
{
    #[Route('/email/validation/{token}', name: 'app_email_validation', methods: ['GET'])]
    public function validateEmail(Request $request, string $token, EntityManagerInterface $entityManager): Response
    {
        $userRepository = $entityManager->getRepository(User::class);
        $user = $userRepository->findOneBy(['emailValidationToken' => $token]);
    
        if (!$user) {
            return $this->json(['message' => 'Token de validation non valide.'], 404);
        }
    
        // Marquez l'utilisateur comme validé
        $user->setEmailValidationToken(null); // Effacez le token pour indiquer que l'e-mail est validé
        $entityManager->flush();
    
        return $this->json(['message' => 'Adresse e-mail validée avec succès.']);
    }
}

