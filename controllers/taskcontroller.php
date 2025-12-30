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
        $tasks = $taskModel->getAll($username = $_SESSION['user']);
        require_once __DIR__ . '/../views/tasks/index.php';
    }

    public function filterByDate() {
        $date = $_GET['date'] ?? date('Y-m-d');

        $taskModel = new TaskModel($this->pdo);
        $tasks = $taskModel->getByDate($date);

        // render partial view untuk board
        require __DIR__ . '/../views/tasks/board.php';
    }

    public function board() { 
        $taskModel = new TaskModel($this->pdo);
        $tasks = $taskModel->getToday();

        $username = $_SESSION['username'] ?? 'G';
        require __DIR__ . '/../views/tasks/board.php'; 
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $duedate = $_POST['due_date'];
            $user_id = $_SESSION['user'];

            $taskModel = new TaskModel($this->pdo);
            $taskModel->createSimpleTask($title, $duedate, $user_id);

            header('Location: /tasks');
            exit();
        }

        // require_once __DIR__ . '/../views/tasks/create.php';
    }

    public function createAdvance() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $due_date = $_POST['due_date'];
            $user_id = $_SESSION['user'];

            $taskModel = new TaskModel($this->pdo);
            $taskModel->createAdvanceTask($title, $description, $due_date, $user_id);
            header('Location: /tasks');
            exit();
        }

        // require_once __DIR__ . '/../views/tasks/create.php';
    }

    public function delete($id) {
        $taskModel = new TaskModel($this->pdo);
        $taskModel->deleteTask($id);

        header('Location: /tasks');
        exit();
    }

    public function update() {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $dueDate = $_POST['due_date'];
        $status = $_POST['status'];

        $taskModel = new TaskModel($this->pdo);
        $taskModel->updateTaskSimple($id, $title, $dueDate, $status);

        header("Location: index.php?page=tasks");
    }

    public function updateAdvance() {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $dueDate = $_POST['due_date'];
        $status = $_POST['status'];

        $taskModel = new TaskModel($this->pdo);
        $taskModel->updateTaskAdvance($id, $title, $description, $dueDate, $status);

        header("Location: index.php?page=tasks");
    }

    public function markAsDone() {
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? 'done';

        if (!$id) {
            throw new Exception("ID tugas tidak ditemukan.");
        }

        $taskModel = new TaskModel($this->pdo);
        $taskModel->updateStatus($id, $status);

        header('Location: index.php?page=tasks');
        exit();
    }

    public function toggleStatus() {
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? null;

        if (!$id || !$status) {
            throw new Exception("Data tidak lengkap.");
        }

        $taskModel = new TaskModel($this->pdo);
        $taskModel->updateStatus($id, $status);

        header('Location: index.php?page=tasks');
        exit();
    }


    // public function updateStatus($id, $status) {
    //     $taskModel = new TaskModel($this->pdo);
    //     $taskModel->updateStatus($id, $status);

    //     header('Location: /tasks');
    //     exit();
    // }
}