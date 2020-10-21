<?php

use htmlacademy\ex\FileFormatException;
use htmlacademy\ex\SourceFileException;
use htmlacademy\controllers\ConvertCSV;
$this->title = 'Task';
$path = \Yii::getAlias('@project');
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
    $userProfile = new ConvertCSV($baseDir . "/user_profile.csv", ['id', 'user_id', 'profile_id']);
    $userTask = new ConvertCSV($baseDir . "/user_task.csv", ['id', 'user_id', 'task_id']);
    $userCategory = new ConvertCSV($baseDir . "/user_category.csv", ['id', 'user_id', 'category_id']);
    echo("Все конвертации проведены");
} catch (SourceFileException $e) {
    echo("Не удалось обработать csv файл: " . $e->getMessage());
} catch (FileFormatException $e) {
    echo("Неверная форма файла импорта: " . $e->getMessage());
}

?>

