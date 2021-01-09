<?php


namespace frontend\models;

use Yii;
use yii\base\Model;

class TaskForm extends Model
{
    public $name;
    public $description;
    public $category;
    public $price;
    public $date_expire;
    public $file;

    private $userTask;

    public function __construct(array $config = [], UserTask $userTask)
    {
        $this->userTask = $userTask;
        parent::__construct($config);
    }

    public static function tableName()
    {
        return 'task';
    }

    public function scenarios()
    {
        return [
            'default' => ['category', 'name', 'description', 'date_expire', 'price', 'file']
        ];
    }

    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required', 'message' => 'Введите название задания'],
            ['description', 'trim'],
            ['description', 'required', 'message' => 'Введите описание задания'],
            ['description', 'string', 'min' => 30, 'tooShort' => 'Значение «Подробности задания» должно содержать минимум 30 символов'],
            ['category', 'required', 'message' => 'Укажите категорию, чтобы находить подходящие задачи'],
        ];
    }

    public function saveForm()
    {
        $task = new Task();
        $taskCategory = new TaskCategory;
        $task->name = $this->name;
        $task->description = $this->description;
        $task->date_add = time();
        $task->date_expire = strtotime($this->date_expire);
        $task->address = "default";
        $task->price = $this->price;
        $task->owner_id = Yii::$app->user->id;
        $task->status = 'new';
        $task->save();

        $this->userTask->link('task', $task);
        $this->userTask->user_id = Yii::$app->user->id;
        $this->userTask->save();

        foreach ($this->file as $file) {
            $taskFile = new TaskFile();
            $taskFile->saveTaskFile($task, $file);
        }

        $taskCategory->saveTaskCategory($task, $this->category);
    }

    public function upload(string $path): bool
    {
        foreach ($this->file as $file) {
            $filename = uniqid() . "-" . time();
            $file->name = $filename . "." . $file->extension;
            $file->saveAs($path . '/' . $filename . '.' . $file->extension);
        }
        return true;
    }
}
