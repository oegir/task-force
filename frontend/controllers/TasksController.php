<?php

namespace frontend\controllers;

use yii\web\NotFoundHttpException;
use frontend\models\Category;
use frontend\models\TaskModel;
use frontend\models\Task;

class TasksController extends SecuredController
{
    public function actionIndex()
    {
        $categories = Category::find()->indexBy('id')->all();
        $allTasks = Task::find()->orderBy('date_add DESC');
        $model = new TaskModel();
        if (\Yii::$app->request->get('TaskModel', false) !== false) {
            $model->load(\Yii::$app->request->get());
        }

        $tasks = $model->applyFilters($allTasks)->all();

        return $this->render('index', compact('tasks', 'categories', 'model'));
    }

    public function actionView($id)
    {
        $task = Task::findOne($id);

        if (!$task) {
            throw new NotFoundHttpException("Задача с ID $id не найдена");
        }

        return $this->render('view', compact('task'));
    }
}
