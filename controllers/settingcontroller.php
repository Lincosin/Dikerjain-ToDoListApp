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
        $userId = $_SESSION['user']['id'];
        $settings = [
            'theme' => $_POST['theme'],
            'notifications' => isset($_POST['notifications']) ? 1 : 0
        ];
        $this->settingModel->updateSettings($userId, $settings);
        header('Location: index.php?page=settings&action=index');
    }
}