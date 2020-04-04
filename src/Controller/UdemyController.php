<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UdemyController extends AbstractController
{
    /**
     * @Route("/udemy", name="udemy")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $todo = new Todo();
        $todo->setStatus('On going')
            ->setPriority('High')
            ->setName('Create udemy courses')
            ->setDateCreation(new \DateTime());

        $em->persist($todo);
        $em->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UdemyController.php',
        ]);
    }

    /**
     * @Route("/todo/{name}", name="todo")
     */

    public function todo(String $name)
    {
        return $this->render('udemy/todo.html.twig', array(
            'name' => $name
        ));
    }
}
