<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/taskmodel.php';

class TaskController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $taskModel = new TaskModel($this->pdo);
        $tasks = $taskModel->getAll();
        require_once __DIR__ . '/../views/tasks/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $taskModel = new TaskModel($this->pdo);
            $taskModel->createTask($title, $description);

            header('Location: /tasks');
            exit();
        }

        require_once __DIR__ . '/../views/tasks/create.php';
    }
}