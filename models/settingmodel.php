<?php
require_once __DIR__ . '/../config.php';

class SettingModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function update($username, $email, $id){
        $stmt = $this->pdo->prepare(
            "UPDATE users SET username = :username, email = :email WHERE id = :id"
        );
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

?>