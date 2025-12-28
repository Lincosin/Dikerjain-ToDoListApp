<?php
require_once __DIR__ . '/../config.php';

class CalendarController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        require __DIR__ . '/../views/calendar/index.php';
    }
}

?>