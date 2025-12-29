<?php
class CalendarModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getTasksForMonth($month, $year) {
        // Query disesuaikan: tabel 'tasks' diganti menjadi 'tugas'
        $stmt = $this->pdo->prepare("SELECT due_date, title FROM tugas WHERE MONTH(due_date) = ? AND YEAR(due_date) = ?");
        $stmt->execute([$month, $year]);
        
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $date = date('Y-m-d', strtotime($row['due_date']));
            $result[$date][] = $row['title'];
        }
        return $result;
    }

    public function getNotesForMonth($month, $year) {
        /** * Karena Anda belum membuat tabel 'notes' di SQL Anda, 
         * fungsi ini akan mengembalikan array kosong agar tidak error.
         */
        return [];
    }
}