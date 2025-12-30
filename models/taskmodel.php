<?php
require_once __DIR__ . '/../config.php';

class TaskModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Ambil semua task dengan due_date = hari ini 
    public function getToday() {
    $today = date('Y-m-d'); // format YYYY-MM-DD
    $stmt = $this->pdo->prepare("SELECT * FROM tugas WHERE DATE(due_date) = ?");
    $stmt->execute([$today]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    
    // Tambahan: ambil semua task (opsional) 
    public function getAll() { 
        $stmt = $this->pdo->query("SELECT * FROM tugas ORDER BY due_date ASC"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } 

    public function createTask($title, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO tugas (title, description) VALUES (:title, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tugas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function updateStatus($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE tugas SET status = :status WHERE id = :id");
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

?>