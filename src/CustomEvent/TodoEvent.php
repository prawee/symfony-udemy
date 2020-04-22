<?php
/**
 * @link http://www.thaiyii.com
 * 2020-04-23 03:40
 * @copyright Copyright (c) 2020 served
 * @author Prawee Wongsa <prawee@hotmail.com>
 * @license MIT
 */

namespace App\CustomEvent;


use App\Entity\Todo;
use Symfony\Component\EventDispatcher\Event;

class TodoEvent extends Event
{
    public const NAME = 'todo.opened';
    protected $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function getTodo()
    {
        return $this->todo;
    }
}