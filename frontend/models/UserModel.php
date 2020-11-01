<?php


namespace frontend\models;

use yii\base\Model;
use yii\db\ActiveQuery;


class UserModel extends Model
{

    public $category = [];
    public $hasOpinion = null;
    public $isOnline = null;
    public $q = null;
    public $isFree = null;
    public $hasFavorite = null;

    public function scenarios()
    {
        return [
            'default' => ['category', 'hasOpinion', 'isOnline', 'isFree', 'hasFavorite', 'q']
        ];
    }

    public function rules()
    {
        return [];
    }

    public function applyFilters(ActiveQuery $searchUser): ActiveQuery
    {
        if (!empty($this->category)) {
            $searchUser->leftJoin('user_category', 'user.id=user_category.user_id');
            $searchUser->andWhere(['`user_category`.`category_id`' => $this->category]);
        }

        if ($this->hasOpinion) {
            $searchUser->andWhere(['not', ['opinion.worker_id' => null]]);
        }

        if ($this->isOnline) {
            $searchUser->andWhere(['profile.online' => true]);
        }

        if ($this->isFree) {
            $searchUser->leftJoin('user_task', 'user.id=user_task.user_id');
            $searchUser->andWhere(['user_task.user_id' => null]);
        }

        if ($this->hasFavorite) {
            $searchUser->andWhere(['>=', 'profile.favorite', 1]);
        }
        if (!empty($this->q)) {
            $searchUser->andWhere(['like', 'name', $this->q]);
        }

        return $searchUser;
    }
}
