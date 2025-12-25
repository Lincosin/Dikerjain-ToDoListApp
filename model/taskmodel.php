<?php
require_once __DIR__ . '/../config.php';

class TaskModel {
    private $conn;

    public function __construct($pdo) { 
        $this->conn = $pdo; 
    }
}

?>