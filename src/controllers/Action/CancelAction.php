<?php


namespace htmlacademy\controllers\Action;


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

    public function isRightMethod($user_id, $owner_id, $worker_id): bool
    {
        $result = false;

        if ($user_id == $owner_id) {
            $result = true;
        }

        return $result;
    }
}
