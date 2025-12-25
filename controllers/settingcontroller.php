<?php
require_once __DIR__ . '/../config.php';

class SettingController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function index() {
        require __DIR__ . '/../views/settings/index.php';
    }
}

?>