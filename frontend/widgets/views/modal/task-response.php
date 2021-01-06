<?

use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>
<section class="modal response-form form-modal" id="response-form">
    <h2>Отклик на задание</h2>
    <?
    $form = ActiveForm::begin([
        'action' => Url::to(['/tasks/response/' . $task->id]),
        'id' => 'task-response',
    ]); ?>
    <p>
        <?= $form->field($model, 'price', ['template' => "{label}{input}\n{error}"])
            ->textInput(['class' => 'response-form-payment input input-middle input-money', 'required' => true, 'type' => 'number', 'min' => 1])->label("Ваша цена", ["class" => 'form-modal-description']); ?>
    </p>
    <p>
        <?= $form->field($model, 'text', ['template' => "{label}{input}\n{error}"])
            ->textarea(['class' => 'input textarea', 'rows' => 4, 'placeholder' => 'Place your text'])->label("Комментарий", ["class" => 'form-modal-description']); ?>
    </p>
    <button class="button modal-button" type="submit">Отправить</button>

    <?php ActiveForm::end(); ?>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>
