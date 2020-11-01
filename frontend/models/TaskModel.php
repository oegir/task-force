<?php


namespace frontend\models;

use yii\base\Model;
use yii\db\ActiveQuery;


class TaskModel extends Model
{

    public $category = [];
    public $time = null;
    public $q = null;
    public $noResponse = null;
    public $remoteWork = null;

    public function scenarios()
    {
        return [
            'default' => ['category', 'time', 'q', 'noResponse', 'remoteWork']
        ];
    }

    public function rules()
    {
        return [];
    }

    public function applyFilters(ActiveQuery $searchTask): ActiveQuery
    {
        if (!empty($this->category)) {
            $searchTask->leftJoin('task_category', 'task.id=task_category.task_id');
            $searchTask->andWhere(['`task_category`.`category_id`' => $this->category]);
        }

        switch ($this->time) {
            case 'month':
                $date = date('Y-m-d', strtotime('-1 month'));
                $searchTask->andWhere(['>=', 'date_add', $date]);
                break;
            case 'week':
                $date = date('Y-m-d', strtotime('-1 week'));
                $searchTask->andWhere(['>=', 'date_add', $date]);
                break;
            case 'day':
                $date = date('Y-m-d', strtotime('-1 day'));
                $searchTask->andWhere(['>=', 'date_add', $date]);
                break;
            case 'all':
            default:
                break;
        }

        if (!empty($this->q)) {
            $searchTask->andWhere(['like', 'name', $this->q]);
        }

        if ($this->noResponse) {
            $searchTask->leftJoin('user_task', '`user_task`.`task_id` = `task`.`id`');
            $searchTask->andWhere(['`user_task`.`task_id`' => null]);
        }

        if ($this->remoteWork) {
            $searchTask->andWhere(['latitude' => '0']);
            $searchTask->andWhere(['longitude' => '0']);
        }

        return $searchTask;
    }
}
