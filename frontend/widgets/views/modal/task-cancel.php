<?

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>
<section class="modal completion-form form-modal" id="complete-form">
    <h2>Завершение задания</h2>
    <p class="form-modal-description">Задание выполнено?</p>

    <?
    $form = ActiveForm::begin([
        'action' => Url::to(['/tasks/cancel/' . $task->id]),
        'id' => 'task-cancel',
    ]); ?>
    <?=
    $form->field($model, 'status')
        ->radioList(
            ['complete' => 'complete', 'failed' => 'failed'],
            [
                'item' => function ($index, $label, $name, $checked, $value) {
                    $arrLabel = [
                        'complete' => [
                            'class' => 'yes',
                            'name' => 'Да'
                        ],
                        'failed' => [
                            'class' => 'difficult',
                            'name' => 'Возникли проблемы'
                        ]
                    ];
                    $return = '<label class="completion-label completion-label--' . $arrLabel[$label]['class'] . '">';
                    $return .= '<input type="radio" class="visually-hidden completion-input completion-input--' . $arrLabel[$label]['class'] . '" name="' . $name . '" value="' . $value . '">';
                    $return .= $arrLabel[$label]['name'];
                    $return .= '</label>';

                    return $return;
                }
            ]
        )
        ->label(false);
    ?>
    <p>
        <?= $form->field($model, 'text', ['template' => "{label}{input}\n{error}"])
            ->textarea(['class' => 'input textarea', 'rows' => 4, 'placeholder' => 'Place your text'])->label("Комментарий", ["class" => 'form-modal-description']); ?>
    </p>
    <p class="form-modal-description">
        Оценка
    </p>
    <div class="feedback-card__top--name completion-form-star">
        <span class="star-disabled"></span>
        <span class="star-disabled"></span>
        <span class="star-disabled"></span>
        <span class="star-disabled"></span>
        <span class="star-disabled"></span>
    </div>
    <?= $form->
    field($model, 'rate')->
    hiddenInput(['id' => 'rating'])->
    label(false) ?>
    <button class="button modal-button" type="submit">Отправить</button>
    <?php ActiveForm::end(); ?>

    <button class="form-modal-close" type="button">Закрыть</button>
</section>
