<?php
require_once __DIR__ . '/config.php';


// 3. Ambil parameter routing sederhana
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// kalau belum login, paksa ke loginForm 
if (!isset($_SESSION['user']) && $page !== 'user') { 
    $page = 'user'; 
    $action = 'loginForm'; 
}

// 4. Routing ke controller
switch ($page) {
    case 'tasks':
        require_once __DIR__ . '/controllers/TaskController.php';
        $controller = new TaskController($pdo);
        break;
    case 'notes':
        require_once __DIR__ . '/controllers/noteccontroller.php';
        $controller = new NoteController($pdo);
        break;
    case 'calendar':
        require_once __DIR__ . '/controllers/calendarcontroller.php';
        $controller = new CalendarController($pdo);
        break;
    case 'settings':
        require_once __DIR__ . '/controllers/SettingsController.php';
        $controller = new SettingsController($pdo);
        break;
    case 'user':
        require_once __DIR__ . '/controllers/usercontroller.php';
        $controller = new UserController($pdo);
        break;
    default:
        require_once __DIR__ . '/controllers/HomeController.php';
        $controller = new HomeController($pdo);
}

// 5. Panggil action (method di controller)
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "404 - Action not found";
}
?>