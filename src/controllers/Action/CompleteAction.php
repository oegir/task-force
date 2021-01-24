<?php


namespace htmlacademy\controllers\Action;


class CompleteAction extends AbstractAction
{
    public function getName()
    {
        return 'Завершить';
    }

    public function getRealName()
    {
        return 'action_complete';
    }

    public function isRightMethod($user, $task)
    {
        $result = false;
        if ($task->status == 'in work' && $task->owner_id == $user->id) {
            $result = true;
        }

        return $result;
    }
}
