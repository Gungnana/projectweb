<?php
class Mahasiswa {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function all() {
        $sql = "SELECT m.*, p.nama_prodi 
                FROM mahasiswa m 
                LEFT JOIN prodi p ON m.prodi_id = p.id";
        return mysqli_query($this->conn, $sql);
    }

    public function find($id) {
        $id = (int)$id;
        $result = mysqli_query($this->conn, "SELECT * FROM mahasiswa WHERE id=$id");
        return mysqli_fetch_assoc($result);
    }

    public function create($data) {
        $sql = "INSERT INTO mahasiswa 
                (nim, nama, alamat, telepon, email, jk, tgl_lahir, prodi_id)
                VALUES (?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "sssssssi",
            $data['nim'],
            $data['nama'],
            $data['alamat'],
            $data['telepon'],
            $data['email'],
            $data['jk'],
            $data['tgl_lahir'],
            $data['prodi_id']
        );
        return mysqli_stmt_execute($stmt);
    }

    public function update($id, $data) {
        $sql = "UPDATE mahasiswa SET 
                    nim=?, nama=?, alamat=?, telepon=?, email=?, jk=?, tgl_lahir=?, prodi_id=?
                WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            "sssssssii",
            $data['nim'],
            $data['nama'],
            $data['alamat'],
            $data['telepon'],
            $data['email'],
            $data['jk'],
            $data['tgl_lahir'],
            $data['prodi_id'],
            $id
        );
        return mysqli_stmt_execute($stmt);
    }

    public function delete($id) {
        $sql = "DELETE FROM mahasiswa WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        return mysqli_stmt_execute($stmt);
    }
}
