<?php

namespace App\Controller;

use App\Entity\User;
use Ramsey\Uuid\Uuid;
use App\Entity\Gender;
use App\Entity\ProfilePicture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RamseyUuidController extends AbstractController
{
    #[Route('/ramsey/uuid', name: 'app_ramsey_uuid', methods: ['POST'])]
    public function __invoke(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): User
    {



      // Récupérer les données de l'utilisateur à partir de la requête POST
      $userData = $request->request->all();
      $file = $request->files->get('file');

      // Créez un nouvel utilisateur
      $user = new User();
      $user->setEmail($userData['email']); // Assurez-vous que votre entité User a une propriété 'email'

      
       // Générez un token de validation par e-mail
       $validationToken = Uuid::uuid4()->toString();
       $user->setEmailValidationToken($validationToken);// Assurez-vous que votre entité User a une propriété 'emailValidationToken'
        

       // Ici, vous enverrez un e-mail de confirmation.

      //   $email = (new TemplatedEmail())
      // ->from('gateafri9@gmail.com')
      // ->to($user->getEmail())
      // ->subject('Validation d\'adresse e-mail')
      // ->text('Cliquez sur le lien pour valider votre adresse e-mail test: ' . $validationToken);

      
  // $mailer->send($email);

  // recuperation des donnees dans POST
      $user->setRoles($userData['roles']);
      $user->setPassword($userData['password']);
      $user->setFirstName($userData['firstName']);
      $user->setLastName($userData['lastName']);
      $user->setBirthDate($userData['birthDate']);

      // Récupérez les entités relier correspondante de la base de données
      $genderId = substr($userData['gender'], strrpos($userData['gender'], '/') + 1);
      $gender = $entityManager->getRepository(Gender::class)->find($genderId);
      $user->setGender($gender);


      if ($file)
      {
        $profilePicture= new ProfilePicture();
        $profilePicture->setFile($file);
        $user->addProfilePicture($profilePicture);
        $entityManager->persist($profilePicture);
        $user->setActiveProfilePicture($profilePicture);
      }
      

      // Enregistrez l'utilisateur en base de données
      $entityManager->persist($user);
      $entityManager->flush();

     

      // Répondez avec une réponse appropriée (par exemple, un JSON indiquant le succès de l'inscription)
      // return $this->json(['message' => 'Inscription réussie !']);
      return $user;
    }
}
