<?php
require_once __DIR__ . '/../config.php';

class SettingController {
    private $pdo;
    private $settingModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        require_once __DIR__ . '/../models/settingmodel.php';
        $this->settingModel = new SettingModel($pdo);
    }

    public function index() {
        // $userId = $_SESSION['user']['id'];
        // $settings = $this->settingModel->getSettingsByUserId($userId);
        require_once __DIR__ . '/../views/settings/index.php';
    }

    public function update() {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $userId = $_SESSION['user'];

        $success = $this->settingModel->update($username, $email, $userId);

        if ($success) {
            // Update session data
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            header("Location: index.php?page=settings&action=index&status=success");
            exit;
        } else {
            header("Location: index.php?page=settings&action=index&status=error");
            exit;
        }
    }
}