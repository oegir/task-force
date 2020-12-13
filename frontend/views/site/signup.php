<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

/* @var $cities */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация аккаунта';
$this->params['breadcrumbs'][] = $this->title;
?>
    <section class="registration__user">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="registration-wrapper">
            <? $form = ActiveForm::begin([
                'id' => 'form-signup',
                'options' => ['class' => 'registration__user-form form-create']
            ]); ?>

            <?= $form->
            field($model, 'email')->
            textarea(['autofocus' => true, 'class' => "input textarea", 'rows' => 1])->
            label('Электронная почта') ?>

            <?= $form->
            field($model, 'username')->
            textarea(['class' => "input textarea", 'rows' => 1])->
            label('Ваше имя') ?>


            <?= $form->field($model, 'city_id')->
            dropDownList($cities, ['class' => 'multiple-select input town-select registration-town', 'options' => [
                '0' => ['Selected' => true]
            ]])->
            label('Город проживания') ?>

            <?= $form->
            field($model, 'password_hash')->
            textInput(['class' => "input textarea"])->
            label('Пароль') ?>

            <div class="form-group">
                <?= Html::submitButton('Создать аккаунт', ['class' => 'button button__registration', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </section>
<?php $this->beginBlock('footerAfterCopyright'); ?>
    <div class="clipart-woman">
        <img src="/img/clipart-woman.png" alt="" width="238" height="450">
    </div>
    <div class="clipart-message">
        <div class="clipart-message-text">
            <h2>Знаете ли вы, что?</h2>
            <p>После регистрации вам будет доступно более
                двух тысяч заданий из двадцати разных категорий.</p>
            <p>В среднем, наши исполнители зарабатывают
                от 500 рублей в час.</p>
        </div>
    </div>
<?php $this->endBlock(); ?>
