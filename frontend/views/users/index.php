<?

use frontend\helpers\SiteHelper;

/** @var $users */

?>
<section class="user__search">
    <div class="user__search-link">
        <p>Сортировать по:</p>
        <ul class="user__search-list">
            <li class="user__search-item user__search-item--current">
                <a href="#" class="link-regular">Рейтингу</a>
            </li>
            <li class="user__search-item">
                <a href="#" class="link-regular">Числу заказов</a>
            </li>
            <li class="user__search-item">
                <a href="#" class="link-regular">Популярности</a>
            </li>
        </ul>
    </div>
    <? foreach ($users as $user): ?>
        <?
        if (!$user->userProfile) {
            return false;
        }
        $about = $user->userProfile['profile']['about'];
        $tasksCount = count($user->userTasks);
        $opinionsCount = count($user->opinions);
        $rate = 0;

        foreach ($user->opinions as $opinion) {
            $rate += $opinion['rate'];
        }

        if ($opinionsCount) {
            $rate = $rate / $opinionsCount;
        }

        $thisCategories = [];

        foreach ($user->userCategories as $userCategory) {
            $thisCategories[] = $userCategory->category[0];
        }

        ?>
        <div class="content-view__feedback-card user__search-wrapper">
            <div class="feedback-card__top">
                <div class="user__search-icon">
                    <a href="#"><img src="./img/man-glasses.jpg" width="65" height="65"></a>
                    <span><?= $tasksCount ?> <?= SiteHelper::plural($tasksCount, ['задание', 'задания', 'заданий']) ?></span>
                    <span><?= $opinionsCount ?> <?= SiteHelper::plural($opinionsCount, ['отзыв', 'отзыва', 'отзывов']) ?></span>
                </div>
                <div class="feedback-card__top--name user__search-card">
                    <p class="link-name"><a href="#" class="link-regular"><?= $user['name'] ?></a></p>
                    <? if ($rate): ?>
                        <? $rateCounts = round($rate);
                        for ($i = 1; $i <= $rateCounts; $i++) {
                            echo "<span></span>";
                        }
                        for ($i = 1; $i <= 5 - $rateCounts; $i++) {
                            echo '<span class="star-disabled"></span>';
                        }
                        ?>
                        <b><?= $rate ?></b>
                    <? endif; ?>
                    <p class="user__search-content">
                        <?= $about ?>
                    </p>
                </div>
                <span
                    class="new-task__time">Был на сайте <?= Yii::$app->formatter->asRelativeTime($user['date_last']) ?></span>
            </div>
            <? if (count($thisCategories)): ?>
                <div class="link-specialization user__search-link--bottom">
                    <? foreach ($thisCategories as $category) : ?>
                        <a href="/category/<?= $category['slug'] ?>"
                           class="link-regular"><?= $category['name'] ?></a>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
        </div>
    <? endforeach; ?>
</section>
<section class="search-task">
    <div class="search-task__wrapper">
        <form class="search-task__form" name="users" method="post" action="#">
            <fieldset class="search-task__categories">
                <legend>Категории</legend>
                <input class="visually-hidden checkbox__input" id="101" type="checkbox" name="" value="" checked
                       disabled>
                <label for="101">Курьерские услуги </label>
                <input class="visually-hidden checkbox__input" id="102" type="checkbox" name="" value="" checked>
                <label for="102">Грузоперевозки </label>
                <input class="visually-hidden checkbox__input" id="103" type="checkbox" name="" value="">
                <label for="103">Переводы </label>
                <input class="visually-hidden checkbox__input" id="104" type="checkbox" name="" value="">
                <label for="104">Строительство и ремонт </label>
                <input class="visually-hidden checkbox__input" id="105" type="checkbox" name="" value="">
                <label for="105">Выгул животных </label>
            </fieldset>
            <fieldset class="search-task__categories">
                <legend>Дополнительно</legend>
                <input class="visually-hidden checkbox__input" id="106" type="checkbox" name="" value="" disabled>
                <label for="106">Сейчас свободен</label>
                <input class="visually-hidden checkbox__input" id="107" type="checkbox" name="" value="" checked>
                <label for="107">Сейчас онлайн</label>
                <input class="visually-hidden checkbox__input" id="108" type="checkbox" name="" value="" checked>
                <label for="108">Есть отзывы</label>
                <input class="visually-hidden checkbox__input" id="109" type="checkbox" name="" value="" checked>
                <label for="109">В избранном</label>
            </fieldset>
            <label class="search-task__name" for="110">Поиск по имени</label>
            <input class="input-middle input" id="110" type="search" name="q" placeholder="">
            <button class="button" type="submit">Искать</button>
        </form>
    </div>
</section>
