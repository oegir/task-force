<?php

use frontend\helpers\SiteHelper;
use frontend\widgets\Rate;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $task */
$this->title = 'TaskForce | ' . $task['name'];

?>

<section class="content-view">
    <div class="content-view__card">
        <div class="content-view__card-wrapper">
            <div class="content-view__header">
                <div class="content-view__headline">
                    <h1><?= $task['name'] ?></h1>
                    <span>Размещено в <?= count($task->categories) > 1 ? "категориях" : "категории" ?>
                        <? foreach ($task->categories as $category): ?>
                            <a href="<?= '/category/' . $category['slug'] ?>"
                               class="link-regular"><?= $category['name'] ?></a>
                        <? endforeach; ?>
                        <?= Yii::$app->formatter->asRelativeTime($task['date_add']) ?>
                      </span>
                </div>
                <b class="new-task__price new-task__price--<?= SiteHelper::array_first($task->categories)['slug'] ?> content-view-price"><?= $task['price'] ?>
                    <b> ₽</b></b>
                <div
                    class="new-task__icon new-task__icon--<?= SiteHelper::array_first($task->categories)['slug'] ?> content-view-icon"></div>
            </div>
            <div class="content-view__description">
                <h3 class="content-view__h3">Общее описание</h3>
                <p>
                    <?= $task['description'] ?>
                </p>
            </div>
            <? if ($task->files): ?>
                <div class="content-view__attach">
                    <h3 class="content-view__h3">Вложения</h3>
                    <? foreach ($task->files as $file): ?>
                        <a target="_blank" href="<?= Url::to([Yii::$app->params['taskImagesPath'] . '/' . $file['file']]) ?>">
                            <?= $file['file'] ?>
                        </a>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
            <div class="content-view__location">
                <h3 class="content-view__h3">Расположение</h3>
                <div class="content-view__location-wrapper">
                    <div class="content-view__map">
                        <a href="#"><img src="/img/map.jpg" width="361" height="292"
                                         alt="Москва, Новый арбат, 23 к. 1"></a>
                    </div>
                    <div class="content-view__address">
                        <span class="address__town">Москва</span><br>
                        <span>Новый арбат, 23 к. 1</span>
                        <p>Вход под арку, код домофона 1122</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-view__action-buttons">
            <button class=" button button__big-color response-button open-modal"
                    type="button" data-for="response-form">Откликнуться
            </button>
            <button class="button button__big-color refusal-button open-modal"
                    type="button" data-for="refuse-form">Отказаться
            </button>
            <button class="button button__big-color request-button open-modal"
                    type="button" data-for="complete-form">Завершить
            </button>
        </div>
    </div>
    <? if ($task->response): ?>
        <div class="content-view__feedback">
            <h2>Отклики <span>(<?= count($task->response) ?>)</span></h2>
            <div class="content-view__feedback-wrapper">
                <? foreach ($task->response as $response): ?>
                    <div class="content-view__feedback-card">
                        <div class="feedback-card__top">
                            <a href="/users/<?= $response->user['id'] ?>">
                                <img src="/img/<?= $response->user->avatar ?>"
                                     width="55"
                                     height="55" alt="">
                            </a>
                            <div class="feedback-card__top--name">
                                <p><a href="/users/<?= $response->user['id'] ?>"
                                      class="link-regular"><?= $response->user['username'] ?></a></p>
                                <?= $response->user->rate ? Rate::widget(['rate' => $response->user->rate, 'option' => 'stars-and-rate']) : "" ?>
                            </div>
                            <span
                                class="new-task__time"><?= Yii::$app->formatter->asRelativeTime($response['date_add']) ?></span>
                        </div>
                        <div class="feedback-card__content">
                            <p><?= $response['description'] ?></p>
                            <span><?= $response['price'] ?> ₽</span>
                        </div>
                        <div class="feedback-card__actions">
                            <a class="button__small-color request-button button"
                               type="button">Подтвердить</a>
                            <a class="button__small-color refusal-button button"
                               type="button">Отказать</a>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    <? endif; ?>
</section>
<section class="connect-desk">
    <div class="connect-desk__profile-mini">
        <div class="profile-mini__wrapper">
            <h3>Заказчик</h3>
            <div class="profile-mini__top">
                <img src="/img/<?= $task->user->avatar ?>" width="62" height="62" alt="Аватар заказчика">
                <div class="profile-mini__name five-stars__rate">
                    <p><?= Html::encode($task->user->username); ?></p>
                    <?= $task->user->rate ? Rate::widget(['rate' => $task->user->rate, 'option' => 'stars-and-rate']) : "" ?>
                </div>
            </div>
            <p class="info-customer">
                <? if (count($task->user->userTasks)): ?>
                    <span>
                    <?= count($task->user->userTasks) . " " . SiteHelper::plural(count($task->user->userTasks), ['заказ', 'заказа', 'заказов']) ?>
                </span>
                <? endif; ?>
                <?
                $relativeDate = Yii::$app->formatter->asRelativeTime($task->user->created_at);
                $date_add = str_replace("назад", "на сайте", $relativeDate);
                ?>
                <span class="last"><?= $date_add ?></span></p>
            <a href="<?= SiteHelper::getUserUrl($task->user) ?>" class="link-regular">Смотреть профиль</a>
        </div>
    </div>
    <div class="connect-desk__chat">
        <h3>Переписка</h3>
        <div class="chat__overflow">
            <div class="chat__message chat__message--out">
                <p class="chat__message-time">10.05.2019, 14:56</p>
                <p class="chat__message-text">Привет. Во сколько сможешь
                    приступить к работе?</p>
            </div>
            <div class="chat__message chat__message--in">
                <p class="chat__message-time">10.05.2019, 14:57</p>
                <p class="chat__message-text">На задание
                    выделены всего сутки, так что через час</p>
            </div>
            <div class="chat__message chat__message--out">
                <p class="chat__message-time">10.05.2019, 14:57</p>
                <p class="chat__message-text">Хорошо. Думаю, мы справимся</p>
            </div>
        </div>
        <p class="chat__your-message">Ваше сообщение</p>
        <form class="chat__form">
            <textarea class="input textarea textarea-chat" rows="2" name="message-text"
                      placeholder="Текст сообщения"></textarea>
            <button class="button chat__button" type="submit">Отправить</button>
        </form>
    </div>
</section>
