<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $city_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Введите ваше имя и фамилию'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Это имя пользователя занято'],
            ['username', 'string', 'min' => 2, 'max' => 255,
                'tooShort' => 'Значение «Ваше имя» должно содержать минимум 2 символа',
                'tooLong' => 'Значение «Ваше имя» должно содержать максимум 255 символов'],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Необходимо заполнить «Электронная почта»'],
            ['email', 'email', 'message' => 'Введите валидный адрес электронной почты'],
            ['email', 'string', 'max' => 255, 'tooLong' => 'Значение «Электронная почта» должно содержать максимум 255 символов'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Эта электронная почта уже используется'],


            ['city_id', 'required', 'message' => 'Укажите город, чтобы находить подходящие задачи'],

            ['password_hash', 'required', 'message' => 'Необходимо заполнить «Пароль»'],
            ['password_hash', 'string', 'min' => Yii::$app->params['user.passwordMinLength'], 'tooShort' => 'Длина пароля от ' . Yii::$app->params['user.passwordMinLength'] . ' символов'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->city_id = $this->city_id;
        $user->avatar = "camera.png";
        $user->setPassword($this->password_hash);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
