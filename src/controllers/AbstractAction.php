<?php


namespace htmlacademy\controllers;


abstract class AbstractAction
{
    abstract public function getName();

    abstract public function getRealName();

    abstract public function isRightMethod(int $user_id, int $owner_id, int $worker_id): bool;
}
