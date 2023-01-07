<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bien;

class AjoutBienController extends AbstractController{

    #[Route('/', 'ajouter.bien', methods:['GET', 'POST'])]
    public function new(): Response {
        $bien = new Bien();
        $form = $this->createForm(AjoutBienType::class, $bien);
        return $this->render('ajoutBien.html.twig', ['form' => $form -> createView() ]);
    }
}
?>