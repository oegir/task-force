<?php


namespace frontend\controllers\Action;


class WorkAction extends AbstractAction
{
    public function getName()
    {
        return 'В работу';
    }

    public function getRealName()
    {
        return 'action_work';
    }

    public function isRightMethod($user, $task)
    {
        $result = false;

        if ($task->status == 'new') {
            if ($task->user && $user->id == $task->user->user_id) {
                $result = false;
            } else {
                $result = true;
            }

        }
        return $result;
    }
}
