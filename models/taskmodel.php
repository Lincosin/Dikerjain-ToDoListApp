<?php
require_once __DIR__ . '/../config.php';

class TaskModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTaskById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tugas WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ambil semua task dengan due_date = hari ini 
    public function getToday() {
        $today = date('Y-m-d'); // format YYYY-MM-DD
        $stmt = $this->pdo->prepare("SELECT * FROM tugas WHERE DATE(due_date) = ?");
        $stmt->execute([$today]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByDate($date) {
        if (!isset($_SESSION['username'])) {
            return [];
        }

        $stmt = $this->pdo->prepare(
            "SELECT t.* 
            FROM tugas t
            LEFT JOIN users u ON t.user_id = u.id
            WHERE u.username = :username
            AND DATE(t.due_date) = :date
            ORDER BY t.due_date ASC"
        );
        $stmt->bindValue(':username', $_SESSION['username'], PDO::PARAM_STR);
        $stmt->bindValue(':date', $date);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Tambahan: ambil semua task (opsional) 
    public function getAll($user_id) { 
        $stmt = $this->pdo->prepare("SELECT * FROM tugas WHERE user_id = :user_id ORDER BY due_date ASC"); 
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function createSimpleTask($title, $due_date, $user_id) { 
        $stmt = $this->pdo->prepare("INSERT INTO tugas (title, due_date, user_id) VALUES (:title, :due_date, :user_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':due_date', $due_date);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute(); 
    }

    public function createAdvanceTask($title, $description, $due_date, $user_id) {
        $stmt = $this->pdo->prepare("INSERT INTO tugas (title, description, due_date, user_id) VALUES (:title, :description, :due_date, :user_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':due_date', $due_date);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }

    public function deleteTask($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tugas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function UpdateTaskSimple($id, $title, $due_date) {
        $stmt = $this->pdo->prepare(
            "UPDATE tugas SET title = :title, due_date = :due_date WHERE id = :id"
        );
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':due_date', $due_date, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateTaskAdvance($id, $title, $description, $due_date, $user_id) {
        $stmt = $this->pdo->prepare("
            UPDATE tugas 
            SET title = :title, description = :description, due_date = :due_date 
            WHERE id = :id AND user_id = :user_id
        ");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':due_date', $due_date);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
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