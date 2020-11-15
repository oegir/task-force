<?

use frontend\helpers\SiteHelper;
use yii\widgets\ActiveForm;

/** @var $users */
/** @var $categories */
/** @var $model */

?>
<section class="user__search">
    <div class="user__search-link">
        <p>Сортировать по:</p>
        <ul class="user__search-list">
            <li class="user__search-item <?= Yii::$app->getRequest()->pathInfo == "users" ? "user__search-item--current" : "" ?>">
                <a href="/users" class="link-regular">Рейтингу</a>
            </li>
            <li class="user__search-item <?= Yii::$app->getRequest()->pathInfo == "users/number" ? "user__search-item--current" : "" ?>">
                <a href="/users/number" class="link-regular">Числу заказов</a>
            </li>
            <li class="user__search-item <?= Yii::$app->getRequest()->pathInfo == "users/popular" ? "user__search-item--current" : "" ?>">
                <a href="/users/popular" class="link-regular">Популярности</a>
            </li>
        </ul>
    </div>
    <? foreach ($users as $user): ?>
        <?
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
                    <a href="#"><img src="/img/man-glasses.jpg" width="65" height="65" alt=""></a>
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
                        <?= $user->userProfile['profile']['about'] ?>
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
        <?php $form = ActiveForm::begin([
            'id' => 'search-user',
            'method' => 'GET',
            'options' => ['class' => 'search-task__form']
        ]);
        ?>
        <fieldset class="search-task__categories">
            <legend>Категории</legend>
            <?= $form->field($model, 'category')->checkboxList($categories, [
                'item' => function ($index, $category, $name, $checked, $id) {
                    $isChecked = $checked ? 'checked' : '';
                    return "
                                <input class='visually-hidden checkbox__input' type='checkbox' {$isChecked} name='$name' id='category-$id'
                                value='$id'>
                                <label for='category-$id'>{$category->name}</label>
                            ";
                }
            ])->label(false) ?>
        </fieldset>
        <fieldset class="search-task__categories">
            <legend>Дополнительно</legend>
            <?= $form->field($model,
                'isFree',
                ['template' => "{input}{label}"])->
            checkbox(['class' => 'visually-hidden checkbox__input'], false)->
            label('Сейчас свободен'); ?>
            <?= $form->field($model,
                'hasOpinion',
                ['template' => "{input}{label}"])->
            checkbox(['class' => 'visually-hidden checkbox__input'], false)->
            label('Есть отзывы'); ?>
            <?= $form->field($model,
                'isOnline',
                ['template' => "{input}{label}"])->
            checkbox(['class' => 'visually-hidden checkbox__input'], false)->
            label('Сейчас онлайн'); ?>
            <?= $form->field($model,
                'hasFavorite',
                ['template' => "{input}{label}"])->
            checkbox(['class' => 'visually-hidden checkbox__input'], false)->
            label('В избранном'); ?>
        </fieldset>
        <?= $form->field($model, 'q')->textInput(['class' => 'input-middle input', 'type' => 'search'])->label('Поиск по имени') ?>
        <button class="button" type="submit">Искать</button>
        <?php ActiveForm::end(); ?>
    </div>
</section>
