<?php

namespace App\Controller;

use App\Entity\Domaine;
use App\Entity\Invest;
use App\Entity\InvestPicture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InvestController extends AbstractController
{
    #[Route('/invest', name: 'app_invest', methods: ['POST'])]
    public function __invoke(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Invest
    {
        $investData = $request->request->all();

        $invest = new Invest();

        $invest->setTitle($investData['title']);
        $invest->setDescription($investData['description']);
        $invest->setNeed($investData['need']);
        $invest->setCollected($investData['collected']);

        $domaine = $serializer->deserialize($investData['domaine'], Domaine::class, 'json');
        $domaine->setTitle($domaine->getTitle());

        $invest->addDomaine($domaine);

        $investFile = $request->files->get('investPicture');
        if($investFile)
        {
            $picture = new InvestPicture();
            $picture->setFile($investFile);
            // $entityManager->persist($picture);
            // $entityManager->flush();

            $invest->addInvestPicture($picture);
        }

        $entityManager->persist($picture);
        $entityManager->persist($invest);
        $entityManager->flush();

        return $invest;
    }
}

