<?php


namespace frontend\widgets;


use common\models\LoginForm;
use yii\base\Widget;

class Modal extends Widget
{
    public $type;

    public function run()
    {
        $type = $this->type;
        $model = new LoginForm();

        if ($type == "login") {
            return $this->render("modal/login", compact('model'));
        }
        return false;
    }
}
