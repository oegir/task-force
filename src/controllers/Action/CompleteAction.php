<?php


namespace htmlacademy\controllers\Action;


class CompleteAction extends AbstractAction
{
    public function getName()
    {
        return 'Выполнено';
    }

    public function getRealName()
    {
        return 'action_complete';
    }

    public function isRightMethod($user_id, $owner_id, $worker_id): bool
    {
        $result = false;

        if ($user_id == $owner_id) {
            $result = true;
        }

        return $result;
    }
}
