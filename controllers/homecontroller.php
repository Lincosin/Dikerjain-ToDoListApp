<?php
require_once __DIR__ . '/../config.php';

class HomeController {
    private $taskModel;
    private $userModel;
    private $settingModel;

    public function __construct($pdo) {
        require_once __DIR__ . '/../models/UserModel.php';
        require_once __DIR__ . '/../models/TaskModel.php';
        require_once __DIR__ . '/../models/SettingModel.php';

        $this->userModel = new UserModel($pdo);
        $this->taskModel = new TaskModel($pdo);
        $this->settingModel = new SettingModel($pdo);
    }

    
    public function index() {
        $userId = $_SESSION['user_id'] ?? null;
        $username = "User";

        // if ($userId) {
        //     $user = $this->userModel->getUserById($userId);
        //     if ($user) {
        //         $username = $user['username'];
        //     }
        // }

        // Ambil data tambahan
        $todayTasks = $this->taskModel->getToday();
        $recentNotes = []; // kalau ada NoteModel, bisa dipanggil di sini

        // Kirim variabel ke view
        include __DIR__ . '/../views/home/index.php';
    }

}

?>