<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Form\TodoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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

    public function todo(String $name, Request $request)
    {
        $form = $this->createForm(TodoType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            print_r($_REQUEST);
            echo 'form submitted';
        }

        /*$form = $this->createFormBuilder()
            ->add('username', TextType::class)
            ->add('password', PasswordType::class)
            ->getForm()
        ;*/

        return $this->render('udemy/todo.html.twig', array(
            'name' => $name,
            'form' => $form->createView()
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

    /**
     * @Route("/updatetodo/{id}", name="update_todo")
     */
    public function updateTodo($id)
    {
        $em = $this->getDoctrine()->getManager();

        $todo = $em->getRepository(Todo::class)
            ->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('No record for todo with this id');
        }

        //print_r($todo);

        $todo->setPriority('Medium')
            ->setName('Updated '.$todo->getName());
        $em->flush();


        return new Response('we have this todo: '.$id);
    }

    /**
     * @Route("deletetodo/{id}", name="delete_todo")
     */
    public function deleteTodo($id)
    {
        $em = $this->getDoctrine()->getManager();

        $todo = $em->getRepository(Todo::class)
            ->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('No record for todo with this id');
        }

        $em->remove($todo);
        $em->flush();

        return new Response("Todo with $id is removed correctly!");
    }
}
