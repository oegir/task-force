<?php

namespace frontend\widgets;

use yii\base\Widget;


class Rate extends Widget
{
    public $rate;
    public $option;

    public function run()
    {
        $rate = $this->rate;
        $option = $this->option;
        if ($option == "stars-and-rate") {
            return $this->render('rate/starsAndRate', compact('rate'));
        } else if ($option == "rate") {
            return $this->render('rate/rate', compact('rate'));
        }
        return false;
    }
}
