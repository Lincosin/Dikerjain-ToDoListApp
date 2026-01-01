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

            // ubah format dari HTML ke MySQL DATETIME
            $dueDate = str_replace('T', ' ', $duedate) . ':00';

            $taskModel = new TaskModel($this->pdo);
            $taskModel->createSimpleTask($title, $dueDate, $user_id);

            header('Location: /tasks');
            exit();
        }
    }

    public function createAdvance() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            date_default_timezone_set('Asia/Singapore');
            $title = $_POST['title'];
            $description = $_POST['description'];
            $due_date = $_POST['due_date'];
            $user_id = $_SESSION['user'];

            $taskModel = new TaskModel($this->pdo);
            $taskModel->createAdvanceTask($title, $description, $due_date, $user_id);
            header('Location: /tasks');
            exit();
        }

        require_once __DIR__ . '/../views/tasks/advance-task.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $user_id = $_SESSION['user'];

            $taskModel = new TaskModel($this->pdo);
            $task = $taskModel->getTaskById($id);

            if (!$task || $task['user_id'] !== $user_id) {
                header('Location: /tasks');
                exit();
            }

            $taskModel->deleteTask($id);
            header('Location: /tasks');
            exit();
        }
    }

    public function update() {
        date_default_timezone_set('Asia/Singapore');
        $id = $_POST['id'];
        $title = $_POST['title'];
        $dueDate = $_POST['due_date'];

        $taskModel = new TaskModel($this->pdo);
        $taskModel->updateTaskSimple($id, $title, $dueDate);

        header("Location: index.php?page=tasks");
    }

    public function updateAdvance() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $due_date = $_POST['due_date'];
            $user_id = $_SESSION['user'];

            $taskModel = new TaskModel($this->pdo);
            $taskModel->updateTaskAdvance($id, $title, $description, $due_date, $user_id);

            header('Location: /tasks');
            exit();
        } else {
            $id = $_GET['id'];
            $taskModel = new TaskModel($this->pdo);
            $task = $taskModel->getTaskById($id);

            require_once __DIR__ . '/../views/tasks/advance-edit.php';
        }
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