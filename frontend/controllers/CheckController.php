<?php


namespace frontend\controllers;

use yii\web\Controller;

use frontend\controllers\Action\WorkAction;
use frontend\controllers\Action\CancelAction;
use frontend\controllers\Action\FailedAction;
use frontend\controllers\Action\CompleteAction;


class CheckController extends Controller
{
    protected $user;
    protected $task;

    public function __construct($user, $task, array $config = [])
    {
        parent::__construct($user, $task, $config);
        $this->user = $user;
        $this->task = $task;
    }

    public function isShowResponseButton()
    {
        $action = new WorkAction();
        return $action->isRightMethod($this->user, $this->task);
    }

    public function isShowPassButton()
    {
        $action = new CancelAction();
        return $action->isRightMethod($this->user, $this->task);
    }

    public function isShowCompleteButton()
    {
        $action = new CompleteAction();
        return $action->isRightMethod($this->user, $this->task);
    }

    public function isShowResponses($response)
    {
        $result = false;
        if ($this->task->response && $this->user->id == $this->task->owner->id) {
            if ($response['status'] != 'reject' && $this->task->status != 'in work' && $this->task->status != 'complete') {
                $result = true;
            }
        }

        return $result;
    }
}
