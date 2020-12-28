<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use frontend\models\Category;
use frontend\models\TaskModel;
use frontend\models\Task;
use frontend\models\TaskForm;

class TasksController extends SecuredController
{
    public function behaviors()
    {
        $rules = parent::behaviors();
        $rule = [
            'allow' => false,
            'actions' => ['create'],
            'matchCallback' => function () {
                return Yii::$app->user->identity->role !== "owner";
            }
        ];

        array_unshift($rules['access']['rules'], $rule);

        return $rules;
    }

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

    public function actionCreate()
    {
        $model = new TaskForm();
        $categories = Category::find()->indexBy('id')->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');
        
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstances($model, 'file');
            
            if ($model->validate()) {
                $model->upload(Yii::$app->params['taskImagesPath']);
                $model->saveForm();
                
                return $this->redirect('/tasks');
            }
        }

        $errors = $model->getErrors();
        return $this->render('create', compact("model", 'categories', 'errors'));
    }
}
