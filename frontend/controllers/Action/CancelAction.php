<?php


namespace frontend\controllers\Action;


class CancelAction extends AbstractAction
{
    public function getName()
    {
        return 'Отказаться';
    }

    public function getRealName()
    {
        return 'action_cancel';
    }

    public function isRightMethod($user, $task)
    {
        $result = false;
        if ($task->user && $user->id == $task->user->user_id && $task->status == 'in work') {
            $result = true;
        }

        return $result;
    }
}
