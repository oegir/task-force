<?
/** @var $rate */

$rates = [
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "four" => 4,
    "five" => 5,
];

$key = array_search($rate, $rates);
?>

<p class="<?=$key?>-rate big-rate"><?=$rates[$key]?><span></span></p>
