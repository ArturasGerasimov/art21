<?php


namespace App\Controller;


use App\Entity\User;

use App\Form\EmployType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmployerController extends AbstractController
{

    /**
     * @Route("/", name="employ")
     */
    public function toEmploy(Request $request)
    {

        $user = new User();
        $form = $this->createForm(EmployType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if($form->getData()->getIsExperienced()){

                $user = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

            } else {

                $file = "list-of-employs/candidates.txt";
                $current = $form->getData()->getName() ."\r\n";
                file_put_contents($file, $current, FILE_APPEND);

            }

            $this->addFlash('success', 'Thank you, form successfully submitted!');

            return $this->redirectToRoute('employ');
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}