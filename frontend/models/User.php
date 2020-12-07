<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $date_last
 *
 * @property Message[] $messages
 * @property Opinion[] $opinions
 * @property UserCategory[] $userCategories
 * @property UserProfile[] $userProfiles
 * @property UserTask[] $userTasks
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['date_last'], 'safe'],
            [['name'], 'string', 'max' => 48],
            [['email'], 'string', 'max' => 128],
            [['password'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'date_last' => 'Date Last',
        ];
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[Opinions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOpinions()
    {
        return $this->hasMany(Opinion::className(), ['worker_id' => 'id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->
        viaTable("user_category", ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasMany(Profile::className(), ['id' => 'profile_id'])->
        viaTable("user_profile", ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['id' => 'task_id'])->
        viaTable('user_task', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserTasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTasks()
    {
        return $this->hasMany(Task::className(), ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[Rate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRate()
    {
        $rate = 0;
        $opinions = $this->opinions;
        foreach ($opinions as $opinion) {
            $rate += $opinion['rate'];
        }

        $opinionsCount = count($opinions);

        if ($opinionsCount) {
            $rate = round($rate / $opinionsCount, 1);
        }

        return $rate;
    }
}
