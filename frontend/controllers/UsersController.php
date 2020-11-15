<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\UserModel;
use yii\web\Controller;
use frontend\models\User;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::find()->indexBy('id')->all();
        $allUsers = User::find()->
        leftJoin('user_profile', 'user_profile.user_id = user.id')->
        andWhere(['not', ['user_profile.user_id' => null]])->
        leftJoin('opinion', 'opinion.worker_id = user.id')->
        leftJoin('profile', 'user_profile.profile_id = profile.id')->
        orderBy("opinion.rate DESC");
        $model = new UserModel();

        if (\Yii::$app->request->get('UserModel', false) !== false) {
            $model->load(\Yii::$app->request->get());
        }

        $users = $model->applyFilters($allUsers)->all();
        return $this->render('index', compact('users', 'categories', 'model'));
    }

    public function actionPopular()
    {
        $categories = Category::find()->indexBy('id')->all();
        $allUsers = User::find()->
        leftJoin('user_profile', 'user_profile.user_id = user.id')->
        andWhere(['not', ['user_profile.user_id' => null]])->
        leftJoin('opinion', 'opinion.worker_id = user.id')->
        leftJoin('profile', 'user_profile.profile_id = profile.id')->
        orderBy("profile.popular DESC");
        $model = new UserModel();
        if (\Yii::$app->request->get('UserModel', false) !== false) {
            $model->load(\Yii::$app->request->get());
        }

        $users = $model->applyFilters($allUsers)->all();

        return $this->render('index', compact('users', 'categories', 'model'));
    }

    public function actionNumber()
    {
        $categories = Category::find()->indexBy('id')->all();
        $allUsers = User::find()->
        select(['user.*','COUNT(user_task.user_id) AS cnt'])->
        leftJoin('user_task', 'user_task.user_id = user.id')->
        leftJoin('user_profile', 'user_profile.user_id = user.id')->
        andWhere(['not', ['user_profile.user_id' => null]])->
        leftJoin('profile', 'user_profile.profile_id = profile.id')->
        groupBy("user.id")->
        orderBy("cnt DESC");

        $model = new UserModel();
        if (\Yii::$app->request->get('UserModel', false) !== false) {
            $model->load(\Yii::$app->request->get());
        }

        $users = $model->applyFilters($allUsers)->all();

        return $this->render('index', compact('users', 'categories', 'model'));
    }
}
