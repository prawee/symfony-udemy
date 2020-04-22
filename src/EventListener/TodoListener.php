<?php
/**
 * @link http://www.thaiyii.com
 * 2020-04-23 03:26
 * @copyright Copyright (c) 2020 served
 * @author Prawee Wongsa <prawee@hotmail.com>
 * @license MIT
 */

namespace App\EventListener;


use App\CustomEvent\TodoEvent;
use App\Entity\Todo;
use Doctrine\ORM\Event\LifecycleEventArgs;

class TodoListener
{
    public function postPersist(LifecycleEventArgs $args)
    {
        //dump('Hello from postPersist event listener TODO');
        $entity = $args->getObject();
        if (!$entity instanceof Todo)
            return;

        //echo $entity->getName();
    }

    public function todoOpened(TodoEvent $todoEvent)
    {
        echo '<br/>'.$todoEvent->getTodo()->getDescription().'<br/>';
        //echo ('Hello from the new event TODO EVENT');
    }
}