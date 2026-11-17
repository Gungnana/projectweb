<?php
require_once 'config/config.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ProdiController.php';
require_once 'controllers/MahasiswaController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'login';

$auth  = new AuthController($conn);
$prodi = new ProdiController($conn);
$mhs   = new MahasiswaController($conn);

// proteksi sederhana
$halaman_butuh_login = ['prodi','prodi_create','prodi_store','prodi_edit','prodi_update','prodi_delete',
                        'mahasiswa','mahasiswa_create','mahasiswa_store','mahasiswa_edit','mahasiswa_update','mahasiswa_delete'];

if (in_array($page, $halaman_butuh_login) && !isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit;
}

switch ($page) {
    case 'login':           $auth->showLogin(); break;
    case 'login_proses':    $auth->login(); break;
    case 'register':        $auth->showRegister(); break;
    case 'register_proses': $auth->register(); break;
    case 'logout':          $auth->logout(); break;

    case 'prodi':           $prodi->index(); break;
    case 'prodi_create':    $prodi->create(); break;
    case 'prodi_store':     $prodi->store(); break;
    case 'prodi_edit':      $prodi->edit(); break;
    case 'prodi_update':    $prodi->update(); break;
    case 'prodi_delete':    $prodi->delete(); break;

    case 'mahasiswa':           $mhs->index(); break;
    case 'mahasiswa_create':    $mhs->create(); break;
    case 'mahasiswa_store':     $mhs->store(); break;
    case 'mahasiswa_edit':      $mhs->edit(); break;
    case 'mahasiswa_update':    $mhs->update(); break;
    case 'mahasiswa_delete':    $mhs->delete(); break;

    default: echo "Halaman tidak ditemukan";
}
