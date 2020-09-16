<?php

namespace htmlacademy\controllers;

class Task
{
    const ACTION_NEW = 'Новое';
    const ACTION_WORK = 'В работе';

    private $worker_id;
    private $owner_id;


    public function __construct($worker_id, $owner_id)
    {
        $this->worker_id = $worker_id;
        $this->owner_id = $owner_id;
    }

    public function getNextAction($action, $user_id)
    {
        $arr = [
            self::ACTION_NEW => [new WorkAction(), new CancelAction()],
            self::ACTION_WORK => [new FailedAction(), new CompleteAction()],
        ];

        foreach ($arr[$action] as $method) {
            if ($method->isRightMethod($user_id, $this->owner_id, $this->worker_id)) {
                return $method;
            };
        }

        return false;
    }
}
