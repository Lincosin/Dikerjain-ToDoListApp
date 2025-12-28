<?php
require_once __DIR__ . '/../config.php';

class UserModel {
    private $conn;

    public function __construct($pdo) { 
        $this->conn = $pdo; 
    }

    // Buat user baru (register)
    public function create($username, $email, $passwordHash) {
        $stmt = $this->conn->prepare(
            "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)"
        );
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password_hash', $passwordHash);
        return $stmt->execute();
    }

    // Cari user berdasarkan ID
    public function find($id) { 
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id"); 
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        $stmt->execute(); 
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    // Autentikasi user (login) bisa pakai username atau email
    public function authenticate($login, $password) { 
        $stmt = $this->conn->prepare("
            SELECT * 
            FROM users 
            WHERE username = :login OR email = :login 
            LIMIT 1
        ");
        $stmt->bindParam(':login', $login); 
        $stmt->execute(); 
        $user = $stmt->fetch(PDO::FETCH_ASSOC); 

        if ($user && password_verify($password, $user['password_hash'])) { 
            return $user; 
        } 
        return false; 
    }


    // Update data user (opsional)
    public function update($id, $username, $email) {
        $stmt = $this->conn->prepare(
            "UPDATE users SET username = :username, email = :email WHERE id = :id"
        );
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Hapus user (opsional)
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

?>