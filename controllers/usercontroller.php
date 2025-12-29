<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/usermodel.php';

class UserController {
    private $userModel; 
    
    public function __construct($pdo) { 
        // pastikan session aktif
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->userModel = new UserModel($pdo); 

        // cek timeout session (30 menit)
        $timeout = 1800; 
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) { 
            session_unset(); 
            session_destroy(); 
            header("Location: index.php?page=users&action=loginForm"); 
            exit; 
        } 
        $_SESSION['last_activity'] = time();
    }

    // Form login
    public function loginForm() {
        require __DIR__ . '/../views/users/login.php';
    }

    // Proses login
    public function login() { 
        $login = $_POST['login'] ?? ''; 
        $password = $_POST['password'] ?? ''; 

        $user = $this->userModel->authenticate($login, $password); 

        if ($user) {
            // simpan ID dan username ke session
            $_SESSION['user'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            // regenerasi session ID untuk keamanan
            session_regenerate_id(true);

            // redirect ke halaman utama
            header("Location: index.php?page=tugas&action=index");
            exit;
        } else {
            $error = "Login gagal: Username/Email atau password salah.";
            require __DIR__ . '/../views/users/login.php';
        }
    }

    // Form register
    public function registerForm() { 
        require __DIR__ . '/../views/users/signup.php'; 
    }

    // Proses register
    public function register() { 
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? ''; 
        $password = $_POST['password'] ?? ''; 
        $confirm = $_POST['confirm_password'] ?? '';

        if ($password !== $confirm) {
            $error = "Password tidak sama!";
            require __DIR__ . '/../views/users/signup.php';
            return;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT); 
        $this->userModel->create($username, $email, $passwordHash); 

        // redirect ke form login
        header("Location: index.php?page=users&action=loginForm"); 
        exit; 
    }

    // Logout
    public function logout() { 
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
        header("Location: index.php?page=users&action=loginForm"); 
        exit; 
    }
}
?>