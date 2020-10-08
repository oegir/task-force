<?php

use htmlacademy\controllers\Task;
use htmlacademy\ex\MyException;
use htmlacademy\ex\FileFormatException;
use htmlacademy\ex\SourceFileException;
use htmlacademy\controllers\ConvertCSV;

$path = \Yii::getAlias('@project');
$this->title = 'Task';

$task = new Task(1, 2);

try {
    echo " из статуса `Новое` заказчик может перевести задачу в `Отменить`";
    debug($task->getNextAction("Новое", 2));
} catch (MyException $e) {
    debug($e->getMessage());
}

try {
    echo " из статуса `В работе` исполнитель может перевести в `Провалено`";
    debug($task->getNextAction("В работе", 1));
} catch (MyException $e) {
    debug($e->getMessage());
}

try {
    echo " из статуса `В работе` заказчик может перевести задачу в `Завершено`";
    debug($task->getNextAction("В работе", 2));
} catch (MyException $e) {
    debug($e->getMessage());
}
$baseDir = $path . "/data";

try {
    $category = new ConvertCSV($baseDir . "/category.csv", ['id', 'name', 'slug']);
    $city = new ConvertCSV($baseDir . "/city.csv", ['id', 'name', 'latitude', 'longitude']);
    $user = new ConvertCSV($baseDir . "/user.csv", ['id', 'name', 'email', 'password', 'date_last']);
    $profile = new ConvertCSV($baseDir . "/profile.csv", ['id', 'address', 'about', 'date_birthday', 'phone', 'skype', 'telegram', 'city_id']);
    $message = new ConvertCSV($baseDir . "/message.csv", ['id', 'date_add', 'description', 'worker_id', 'owner_id']);
    $opinion = new ConvertCSV($baseDir . "/opinion.csv", ['id', 'date_add', 'rate', 'description', 'owner_id', 'worker_id']);
    $task = new ConvertCSV($baseDir . "/task.csv", ['id', 'name', 'description', 'date_add', 'date_expire', 'price', 'address', 'latitude', 'longitude']);
    $taskCategory = new ConvertCSV($baseDir . "/task_category.csv", ['id', 'task_id', 'category_id']);
} catch (SourceFileException $e) {
    echo("Не удалось обработать csv файл: " . $e->getMessage());
} catch (FileFormatException $e) {
    echo("Неверная форма файла импорта: " . $e->getMessage());
}

?>

