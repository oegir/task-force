<?php


namespace htmlacademy\controllers;


class CancelAction extends AbstractAction
{
    public function getName()
    {
        return 'Отменено';
    }

    public function getRealName()
    {
        return 'action_cancel';
    }

    public function isRightMethod($user_id, $owner_id, $worker_id)
    {
        if ($user_id == $owner_id) {
            return true;
        }
        return false;
    }
}
