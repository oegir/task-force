<?php

use htmlacademy\controllers\Task;

require_once 'vendor/autoload.php';
require_once 'functions.php';

$task = new Task(1, 2);

echo " из статуса `Новое` исполнитель может перевести только `В работу`";
debug($task->getNextAction("Новое", 1));

echo " из статуса `Новое` заказчик может перевести задачу в `Отменить`";
debug($task->getNextAction("Новое", 2));

echo " из статуса `В работе` исполнитель может перевести в `Провалено`";
debug($task->getNextAction("В работе", 1));

echo " из статуса `В работе` заказчик может перевести задачу в `Завершено`";
debug($task->getNextAction("В работе", 2));
