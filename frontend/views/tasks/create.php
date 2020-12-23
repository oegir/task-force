<?
/** @var $model */
/** @var $categories */

/** @var $errors */

use yii\bootstrap\ActiveForm;

$this->title = 'TaskForce | Создать задачу';
$names = [
    'name' => 'Мне нужно',
    'description' => 'Подробности задания',
    'category' => 'Категория',
    'file' => 'Файлы',
]
?>
<section class="create__task">
    <h1>Публикация нового задания</h1>
    <? $form = ActiveForm::begin([
        'id' => 'task-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>
    <div class="create__task-main">
        <div class="create__task-form form-create">
            <?= $form->
            field($model, 'name')->
            textarea(['class' => "input textarea", 'rows' => 1])->
            label('Мне нужно') ?>
            <span>Кратко опишите суть работы</span>
            <?= $form->
            field($model, 'description')->
            textarea(['class' => "input textarea", 'rows' => 7])->
            label('Подробности задания') ?>
            <span>Укажите все пожелания и детали, чтобы исполнителям было проще соориентироваться</span>
            <?= $form->field($model, 'category')->dropDownList($categories)->label("Категория") ?>
            <span>Выберите категорию</span>
            <label>Файлы</label>
            <span>Загрузите файлы, которые помогут исполнителю лучше выполнить или оценить работу</span>
            <?= $form->field($model, 'file[]',
                [
                    'template' => ' <label class="create__file">
                <span>Добавить новый файл</span>
                {input}
            </label>'
                ])->fileInput(['class' => 'sr-only', 'multiple' => true])->label(false) ?>
            <label for="13">Локация</label>
            <input class="input-navigation input-middle input" id="13" type="search" name="q"
                   placeholder="Санкт-Петербург, Калининский район">
            <span>Укажите адрес исполнения, если задание требует присутствия</span>
            <div class="create__price-time">
                <?= $form->
                field($model, 'price',
                    [
                        "template" => "{label}{input}{error}<span>Не заполняйте для оценки исполнителем</span>",
                        "options" => ["class" => "create__price-time--wrapper"]
                    ])->
                textarea(['class' => "input textarea input-money", 'rows' => 1])->
                label('Бюджет') ?>
                <?= $form->
                field($model, 'date_expire',
                    [
                        "template" => "{label}{input}{error}<span>Укажите крайний срок исполнения</span>",
                        "options" => ["class" => "create__price-time--wrapper"]
                    ])->
                textInput(['class' => "input-middle input input-date", 'type' => "date", "min" => date("Y-m-d")])->
                label('Срок исполнения') ?>
            </div>
        </div>
        <div class="create__warnings">
            <div class="warning-item warning-item--advice">
                <h2>Правила хорошего описания</h2>
                <h3>Подробности</h3>
                <p>Друзья, не используйте случайный<br>
                    контент – ни наш, ни чей-либо еще. Заполняйте свои
                    макеты, вайрфреймы, мокапы и прототипы реальным
                    содержимым.</p>
                <h3>Файлы</h3>
                <p>Если загружаете фотографии объекта, то убедитесь,
                    что всё в фокусе, а фото показывает объект со всех
                    ракурсов.</p>
            </div>
            <? if ($errors): ?>
                <div class="warning-item warning-item--error">
                    <h2>Ошибки заполнения формы</h2>
                    <? foreach ($errors as $error => $key): ?>
                        <h3>«<?= $names[$error] ?>»</h3>
                        <? foreach ($key as $text): ?>
                            <p><?= $text ?></p><br>
                        <? endforeach; ?>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
        </div>
    </div>
    <button form="task-form" class="button" type="submit">Опубликовать</button>
    <?php ActiveForm::end(); ?>
</section>
