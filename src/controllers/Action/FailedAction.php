<?php


namespace htmlacademy\controllers\Action;


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

    public function isRightMethod($user_id, $owner_id, $worker_id): bool
    {
        $result = false;

        if ($user_id == $worker_id) {
            $result = true;
        }

        return $result;
    }
}
