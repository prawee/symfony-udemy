<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
            ->setPriority('Low')
            ->setName('public youtube video')
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

    /**
     * @Route("/udemy/details", name="todo_details")
     */
    public function getDetails()
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            //->find(10);
            //->findAll();
            ->findByName('youtube');
        //var_dump($todo->getName());
        if (!$todo) {
            throw $this->createNotFoundException('No record for todo with this id');
        }
        //return new Response($todo->getName());

        foreach($todo as $t) {
            echo '<p>'.$t->getName().'</p>';
        }
        //return new Response(print_r($todo));
    }
}
