<?php

namespace htmlacademy\controllers;

use htmlacademy\ex\MyException;
use htmlacademy\controllers\Action\WorkAction;
use htmlacademy\controllers\Action\CancelAction;
use htmlacademy\controllers\Action\FailedAction;
use htmlacademy\controllers\Action\CompleteAction;

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

    public function getNextAction(string $action, int $user_id): ?object
    {
        $result = null;
        $arr = [
            self::ACTION_NEW => [new WorkAction(), new CancelAction()],
            self::ACTION_WORK => [new FailedAction(), new CompleteAction()],
        ];

        if (!array_key_exists($action, $arr)) {
            throw new MyException("Метода '" . $action . "' не существует");
        }

        foreach ($arr[$action] as $method) {
            if ($method->isRightMethod($user_id, $this->owner_id, $this->worker_id)) {
                $result = $method;
            };
        }

        return $result;
    }
}
