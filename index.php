<?php

use htmlacademy\controllers\Task;

require_once 'vendor/autoload.php';

$task = new Task(1,2);

echo $task->getNextStatus('Отменить', 2);
