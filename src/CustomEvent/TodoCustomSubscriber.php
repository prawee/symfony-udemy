<?php
/**
 * @link http://www.thaiyii.com
 * 2020-04-23 04:12
 * @copyright Copyright (c) 2020 served
 * @author Prawee Wongsa <prawee@hotmail.com>
 * @license MIT
 */

namespace App\CustomEvent;


use App\CustomEvent\TodoEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TodoCustomSubscriber implements EventSubscriberInterface
{

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            TodoEvent::NAME => 'todoOpened'
        ];
    }

    public function todoOpened(TodoEvent $todoEvent)
    {
        echo 'Hello from the subscriber'.$todoEvent->getTodo()->getDescription();
    }
}