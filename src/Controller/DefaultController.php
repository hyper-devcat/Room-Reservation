<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// class DefaultController extends AbstractController
// {
//     /**
//      * @Route("/default", name="default")
//      */
//     public function index()
//     {

//         $users = ['Alex', 'Bella', 'Chloé', 'Dora'];

//         return $this->render('default/index.html.twig', [

//             'controller_name' => 'DefaultController',

//             'users' => $users,

//         ] );
//     }
// }

class DefaultController extends AbstractController
{

    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route('/default',name:'default')]

    public function index() : Response{

            /*
        $entityManager = $this->doctrine->getManager();
 
        $users = [
            'Paco','Maria','Jose'
        ];
        for ($i = 0;$i < sizeof($users);$i++){
            $user = new User();
            $user->setName($users[$i]);
            $entityManager->persist($user);

    }
    $entityManager->flush()*/
    $entityManager = $this->doctrine->getManager();
    $user = [];
    $users = $entityManager->getRepository(User::class)->findAll();
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users
        ]);
    }
}