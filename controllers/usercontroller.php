<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/usermodel.php';

class UserController {
    private $userModel; 
    
    public function __construct($pdo) { 
        $this->userModel = new UserModel($pdo); 
        // cek timeout session (30 menit) 
        $timeout = 1800; 
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) { 
            session_unset(); 
            session_destroy(); 
            header("Location: index.php?page=users&action=login"); 
            exit; 
        } 
        $_SESSION['last_activity'] = time();
    }
    
    public function sidebar() {
    session_start();
    $userId = $_SESSION['user'] ?? null;
    $username = "User";
    if ($userId) {
        $user = $this->userModel->find($userId);
        if ($user) {
            $username = $user['username'];
        }
    }
    echo "DEBUG: userId = " . $userId; echo "DEBUG: username = " . $username;
        include 'views/sidebar.php'; // view akan punya $username
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
        // simpan ID user ke session
        $_SESSION['user'] = $user['id'];  

        // regenerasi session ID untuk keamanan
        session_regenerate_id(true);  

        // redirect ke halaman utama
        header("Location: index.php?page=tugas&action=index"); 
        exit; 
    } else { 
        $error = "Username/Email atau password salah!"; 
        require __DIR__ . '/../views/users/login.php'; 
    } 
}


    // Form register
    public function registerForm() { 
        require __DIR__ . '/../views/users/signup.php'; 
    }

    // Proses register
    public function register() { 
        $username = $_POST['username'];
        $email = $_POST['email']; 
        $password = $_POST['password']; 

        if ($_POST['password'] !== $_POST['confirm_password']) {
            $error = "Password tidak sama!";
            require __DIR__ . '/../views/users/signup.php';
            return;
        }


        $passwordHash = password_hash($password, PASSWORD_DEFAULT); 
        $this->userModel->create($username, $email, $passwordHash); 
        header("Location: index.php?page=user&action=loginForm"); 
        exit; 
    }

    // Logout
    public function logout() { 
        session_destroy(); 
        header("Location: index.php?page=user&action=loginForm"); 
        exit; 
    }
}
?>