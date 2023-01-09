<?php
    namespace App\Controller\Admin;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Annotation\Route;
    use App\Entity\User;
    use App\Form\InscriptionType;



    class ConnexionController extends AbstractController{

        //This function allow the user to sign into the website
        #[Route('/connexion', 'connexion.admin', methods:['GET', 'POST'])]
        public function login(): Response{

            return $this->render('Admin/connexion.html.twig',[
                'controller_name'=>'ConnexionController',
            ]);
        }

        //this function allow us to log out 
        #[Route('/logout', 'logout.admin')]
        public function logout(){

        }

        //this function allow us to Sign up 
        #[Route('/SignUp', 'signUp.admin', methods:['GET', 'POST'])]
        public function inscription(Request $request, EntitymanagerInterface $manager) : Response{

            $user = new User();
            $user->setRoles(['ROLE_USER']);
            $form = $this->createForm(InscriptionType::class, $user);

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $user = $form->getData();

                $this->addFlash(
                    'success',
                    'votre compte a été créé'
                );

                $manager->persist($user);
                $manager->flush();

                return $this->redirectToRoute('login');
            }
                
            return $this->render('Admin/inscription.html.twig',[
                'form' => $form->createView()
            ]);
        }
    }
?>