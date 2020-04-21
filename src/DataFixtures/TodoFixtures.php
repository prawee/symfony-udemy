<?php

namespace App\DataFixtures;

use App\Entity\Todo;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TodoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 10; $i< 20; $i++) {
            /*$user = new User();
            $user->setUsername('Anonymouse '+ $i)
                ->setTodo()
            ;*/


            $todo = new Todo();
            $todo->setName('This is another todo with id ', rand($i, 516))
                ->setDescription('Lorem ipsum dolor simet')
                ->setPriority('High')
                ->setStatus('Pending')
                ->setCreateData(new \DateTime())
                ->setDateDue(null)
            ;

            //$user->setTodo($todo);

            $manager->persist($todo);
            //$manager->persist($user);

        }
        $manager->flush();
    }
}
