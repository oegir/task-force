<?php


namespace htmlacademy\controllers\Action;


abstract class AbstractAction
{
    abstract public function getName();

    abstract public function getRealName();

    abstract public function isRightMethod($user, $task);
}
