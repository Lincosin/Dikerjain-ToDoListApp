<?php
require_once __DIR__ . '/../config.php';

class NoteModel {
    private $conn;

    public function __construct($pdo) { 
        $this->conn = $pdo; 
    }
}

?>