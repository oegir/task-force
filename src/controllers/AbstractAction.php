<?php


namespace htmlacademy\controllers;


abstract class AbstractAction
{
    abstract public function getName();

    abstract public function getRealName();

    abstract public function isRightMethod($user_id, $owner_id, $worker_id);
}
