<?php


namespace htmlacademy\controllers;

use htmlacademy\ex\SourceFileException;
use htmlacademy\ex\FileFormatException;

class ConvertCSV
{
    private $name;
    private $text;

    public function __construct(string $csvFile, array $columns)
    {
        $this->name = basename($csvFile, ".csv");

        if (!file_exists($csvFile)) {
            throw new SourceFileException("Файла '" . $csvFile . "' не существует");
        }

        $this->file = new \SplFileObject($csvFile);
        $this->file->setFlags(\SplFileObject::READ_CSV);
        $this->text = "SET foreign_key_checks = 0;\n";

        foreach ($this->file as $row) {
            $text = '';
            $keys = [];

            foreach ($row as $key) {
                if (!empty($key)) {
                    if (count($row) !== count($columns)) {
                        throw new FileFormatException("<b>" . $csvFile . "</b>" . " - нет необходимых столбцов," . " строка: " . implode(",", $row));
                    }
                    $keys[] = "\"$key\"";
                }
            }

            if (!empty($keys)) {
                $text = "INSERT INTO `" . $this->name . "` (" . implode(',', $columns) . ") VALUES " . "(" . implode(',', $keys) . ");" . PHP_EOL;
            }

            $this->text .= $text;
        }
        $this->text .= "SET foreign_key_checks = 1;";

        $this->saveToDir();
    }

    private function saveToDir()
    {
        if (!is_dir("sql")) {
            mkdir("sql", 0777, true);
        }

        file_put_contents('sql/' . $this->name . '.sql', $this->text);
    }

}
