<?php
class User {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function register($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql  = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
        return mysqli_stmt_execute($stmt);
    }

    public function login($username, $password) {
        $sql  = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user   = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
