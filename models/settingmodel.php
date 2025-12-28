<?php
require_once __DIR__ . '/../config.php';

class SettingModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getSettingsByUserId($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM settings WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSettings($userId, $settings) {
        $stmt = $this->pdo->prepare("UPDATE settings SET theme = :theme, notifications = :notifications WHERE user_id = :user_id");
        return $stmt->execute([
            'theme' => $settings['theme'],
            'notifications' => $settings['notifications'],
            'user_id' => $userId
        ]);
    }
}

?>