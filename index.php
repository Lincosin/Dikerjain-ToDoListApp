<?php
require_once __DIR__ . '/config.php';

// Ambil parameter routing sederhana
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// kalau belum login, paksa ke loginForm 
if (!isset($_SESSION['user']) && $page !== 'user') { 
    $page = 'user'; 
    $action = 'loginForm'; 
}

// Routing ke controller
switch ($page) {
    case 'tasks':
        require_once __DIR__ . '/controllers/taskcontroller.php';
        $controller = new TaskController($pdo);
        break;
    case 'calendar':
        require_once __DIR__ . '/controllers/calendarcontroller.php';
        $controller = new CalendarController($pdo);
        break;
    case 'settings':
        require_once __DIR__ . '/controllers/settingcontroller.php';
        $controller = new SettingController($pdo);
        break;
    case 'user':
        require_once __DIR__ . '/controllers/usercontroller.php';
        $controller = new UserController($pdo);
        break;
    default:
        require_once __DIR__ . '/controllers/HomeController.php';
        $controller = new HomeController($pdo);
}

// Panggil action (method di controller)
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "404 - Action not found";
}
?>