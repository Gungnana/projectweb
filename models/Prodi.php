<?php
class Prodi {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function all() {
        $result = mysqli_query($this->conn, "SELECT * FROM prodi");
        return $result;
    }

    public function find($id) {
        $id = (int)$id;
        $result = mysqli_query($this->conn, "SELECT * FROM prodi WHERE id=$id");
        return mysqli_fetch_assoc($result);
    }

    public function create($nama_prodi, $jenjang, $singkatan) {
        $sql = "INSERT INTO prodi (nama_prodi, jenjang, singkatan) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nama_prodi, $jenjang, $singkatan);
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $nama_prodi, $jenjang, $singkatan) {
        $sql = "UPDATE prodi SET nama_prodi=?, jenjang=?, singkatan=? WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $nama_prodi, $jenjang, $singkatan, $id);
        return mysqli_stmt_execute($stmt);
    }

    public function delete($id) {
        $sql = "DELETE FROM prodi WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
