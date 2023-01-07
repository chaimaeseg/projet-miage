<?php
namespace App\Controller;

use App\Repository\BienRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController{

    #[Route('/', 'categ.index', methods:['GET'])]
    public function index(BienRepository $repository, PaginatorInterface $paginator, Request $request) : Response {

        $bien = $paginator->paginate(
            $repository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
       
     
        return $this->render('categorie.html.twig', [ 'bien' => $bien]);
    }
}
?>