<?php
require_once __DIR__ . '/../config.php';

class TaskModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Ambil semua task dengan due_date = hari ini 
    public function getToday() { $today = date('Y-m-d'); // format YYYY-MM-DD 
        $stmt = $this->pdo->prepare("SELECT * FROM tugas WHERE due_date = ?"); 
        $stmt->execute([$today]); return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 
    
    // Tambahan: ambil semua task (opsional) 
    public function getAll() { 
        $stmt = $this->pdo->query("SELECT * FROM tasks ORDER BY due_date ASC"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 

    // public function getAllTasks() {
    //     $stmt = $this->pdo->prepare("SELECT * FROM tasks");
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function createTask($title, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }}

?>