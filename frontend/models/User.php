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
        return $this->hasMany(Opinion::className(), ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[UserCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCategories()
    {
        return $this->hasMany(UserCategory::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserTasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTasks()
    {
        return $this->hasMany(UserTask::className(), ['user_id' => 'id']);
    }
}
