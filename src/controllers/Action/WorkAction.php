<?php


namespace htmlacademy\controllers\Action;


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

    public function isRightMethod($user_id, $owner_id, $worker_id): bool
    {
        $result = false;

        if ($user_id == $worker_id) {
            $result = true;
        }

        return $result;
    }
}
