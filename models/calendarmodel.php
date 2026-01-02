<?php
class CalendarModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTasksForMonth($month, $year, $userId) {
        $sql = "SELECT * FROM tugas 
                WHERE MONTH(due_date) = :month 
                AND YEAR(due_date) = :year 
                AND user_id = :user_id"; 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':month' => (int)$month,
            ':year' => (int)$year,
            ':user_id' => $userId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}