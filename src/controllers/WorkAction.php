<?php


namespace htmlacademy\controllers;


class WorkAction extends AbstractAction
{
    public function getName()
    {
        return 'В работе';
    }

    public function getRealName()
    {
        return 'action_work';
    }

    public function isRightMethod($user_id, $owner_id, $worker_id)
    {
        if ($user_id == $worker_id) {
            return true;
        }
        return false;
    }
}
