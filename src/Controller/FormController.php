<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController{

    #[Route('/', 'form.index', methods:['GET'])]
    public function index() : Response {
        return $this->render('form.html.twig');
    }
}
?>