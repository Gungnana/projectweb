CREATE DATABASE db_mahasiswa;
USE db_mahasiswa;

-- Tabel users (untuk login / registrasi)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabel prodi
CREATE TABLE prodi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_prodi VARCHAR(100),
    jenjang VARCHAR(10),
    singkatan VARCHAR(20)
);

-- Tabel mahasiswa
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20),
    nama VARCHAR(100),
    alamat TEXT,
    telepon VARCHAR(20),
    email VARCHAR(100),
    jk ENUM('L','P'),
    tgl_lahir DATE,
    prodi_id INT,
    FOREIGN KEY (prodi_id) REFERENCES prodi(id)
);
