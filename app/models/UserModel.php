<?php
class UserModel {
    private $conn;

    public function __construct() {
        require_once 'app/config/database.php';
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function findUser($username) {
        $stmt = $this->conn->prepare("SELECT * FROM account WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $fullname, $password, $role = 'user') {
    $stmt = $this->conn->prepare("INSERT INTO account (username, fullname, password, role) VALUES (?, ?, ?, ?)");
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    return $stmt->execute([$username, $fullname, $hashed, $role]);
}

}
