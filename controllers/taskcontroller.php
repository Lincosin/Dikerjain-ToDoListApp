<?php
require_once __DIR__ . '/../models/taskmodel.php';

class TaskController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        // $tasks = Task::all();
        require_once __DIR__ . '/../views/tasks/index.php';
    }
}