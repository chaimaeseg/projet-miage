<?php

namespace App\Controller\Admin;

use App\Repository\BienRepository;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bien;
use App\Form\BienType;


class CategorieController extends AbstractController{

    /* Ce Controlleur affiche les biens */

    #[Route('/categ', 'categ.index', methods:['GET'])]
    public function index(PaginatorInterface $paginator, BienRepository $repository, Request $request) : Response {
        
        /*Afficher les Biens dans plusieurs page
        en utilisant le bundle knblabs*/
         $biens = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page',1),
            10
        );

       return $this->render('categorie.html.twig', [
         'bien' => $biens,
        ]);
    }

    //This function contains a form to create un bien
    #[Route('/new', 'bien.new', methods:['GET', 'POST'])]
    public function new(Request $request, EntitymanagerInterface $manager) : Response{

        $bien = new Bien();
        $form = $this->createForm(BienType::class, $bien);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $bien = $form->getData();

            $manager->persist($bien);
            $manager->flush();

            $this->addFlash(
                'success',
                'Votre Bien a été ajouté avec succes'
            );

            return $this->redirectToRoute('categorie');
        }

        return $this->render('Admin/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    //this function allow us to modify un bien
    #[Route('/edit', 'bien.edit', methods:['GET', 'POST'])]
    public function edit(Bien $bien, Request $request, EntitymanagerInterface $manager) : Response {

        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $bien=$form->getData();

            $manager->persist($bien);
            $manager->flush();

            $this->addFlash(
                'success',
                'Le bien a été modifié avec succes'
            ); 

            return $this->redirectToRoute('categorie');
        }

        return $this->render('Admin/edit.html.twig', [
            'form'->$form->createView()
        ]);
    }

     //this function allow us to delete un bien
     #[Route('/delete', 'bien.delete', methods:['GET', 'POST'])]
     public function delete(Bien $bien, EntitymanagerInterface $manager) : Response {
 
             $manager->remove($bien);
             $manager->flush();
 
             $this->addFlash(
                 'success',
                 'Le bien a été supprimé avec succes'
             ); 
 
             return $this->redirectToRoute('categorie');

     }
 
}
?>