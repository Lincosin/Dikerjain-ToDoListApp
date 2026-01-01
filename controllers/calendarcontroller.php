<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/CalendarModel.php';

class CalendarController {
    private $pdo;
    private $model;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        // Memastikan model terinisialisasi dengan koneksi database
        $this->model = new CalendarModel($this->pdo);
    }

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userId = $_SESSION['user'] ?? null;

        $month = isset($_GET['month']) ? (int)$_GET['month'] : (int)date('n');
        $year  = isset($_GET['year']) ? (int)$_GET['year'] : (int)date('Y');

        try {
            $rows = $this->model->getTasksForMonth($month, $year, $userId); // flat rows
        } catch (Exception $e) {
            $rows = [];
        }

        // bikin versi keyed by tanggal untuk indikator kalender
        $tasksByDate = [];
        foreach ($rows as $row) {
            $dateKey = date('Y-m-d', strtotime($row['due_date']));
            if (!isset($tasksByDate[$dateKey])) {
                $tasksByDate[$dateKey] = [];
            }
            $tasksByDate[$dateKey][] = $row;
        }

        $page = 'calendar';
        require_once __DIR__ . '/../views/calendar/index.php';
    }
}