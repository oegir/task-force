<?
/** @var $rate */
?>
<? for ($i = 0; $i < 5; $i++): ?>
    <span <?= $rate > $i ? '' : 'class="star-disabled"'; ?>></span>
<? endfor; ?>
<b><?= $rate ?></b>
