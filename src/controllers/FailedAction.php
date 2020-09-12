<?php


namespace htmlacademy\controllers;


class FailedAction extends AbstractAction
{
    public function getName()
    {
        return 'Провалено';
    }

    public function getRealName()
    {
        return 'action_failed';
    }

    public function isRightMethod($user_id, $owner_id, $worker_id)
    {
        if ($user_id == $worker_id) {
            return true;
        }
        return false;
    }
}
