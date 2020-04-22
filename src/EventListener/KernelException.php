<?php
/**
 * @link http://www.thaiyii.com
 * 2020-04-23 02:06
 * @copyright Copyright (c) 2020 served
 * @author Prawee Wongsa <prawee@hotmail.com>
 * @license MIT
 */

namespace App\EventListener;


class KernelException
{
    public function onKernelException()
    {
        die('I am listener');
    }
}