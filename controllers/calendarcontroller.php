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
        // Cek apakah session sudah dimulai di index.php, jika belum maka mulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Mengambil nama user dari session atau default 'Guest'
        $username = $_SESSION['username'] ?? 'Guest Amigo';

        // Mengambil bulan dan tahun dari URL (untuk navigasi kalender)
        // Jika tidak ada di URL, gunakan bulan dan tahun saat ini
        $month = isset($_GET['month']) ? $_GET['month'] : date('m');
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

        /**
         * Mengambil data dari Model.
         * Kita menggunakan try-catch agar jika terjadi error database, 
         * halaman kalender tetap bisa tampil meskipun kosong.
         */
        try {
            $tasks = $this->model->getTasksForMonth($month, $year);
            $notes = $this->model->getNotesForMonth($month, $year);
        } catch (Exception $e) {
            $tasks = [];
            $notes = [];
            // Log error bisa ditambahkan di sini jika perlu
        }

        // Pastikan variabel page ada agar sidebar tidak error (Undefined Variable $page)
        $page = 'calendar';

        // Memanggil file view kalender
        require_once __DIR__ . '/../views/calendar/index.php';
    }
}