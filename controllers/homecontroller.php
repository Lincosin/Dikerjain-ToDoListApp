<?php
require_once __DIR__ . '/../config.php';

class HomeController {
    private $taskModel;
    private $noteModel;
    private $userModel;
    private $settingModel;

    public function __construct($pdo) {
        // $this->userModel = $userModel;
        // require_once __DIR__ . '/../models/TaskModel.php';
        require_once __DIR__ . '/../model/settingmodel.php';
        require_once __DIR__ . '/../model/notemodel.php';
        // $this->taskModel = new TaskModel($pdo);
        $this->noteModel = new NoteModel($pdo);
        $this->settingModel = new SettingModel($pdo);
    }
    
    public function index() {
        $userId = $_SESSION['user_id'] ?? null;
        $username = "User";
        
        if ($userId) {
            $user = $this->userModel->getUserById($userId);
            if ($user) {
                $username = $user['username'];
            }
        }

        // kirim variabel ke view
        include 'views/home/index.php';

        // $todayTasks = $this->taskModel->getToday();
        // $recentNotes = $this->noteModel->getRecent(5);
        require __DIR__ . '/../views/home/index.php';
    }
    
}

?>