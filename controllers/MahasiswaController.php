<?php
require_once 'models/Mahasiswa.php';
require_once 'models/Prodi.php';

class MahasiswaController {
    private $mhs;
    private $prodi;

    public function __construct($conn) {
        $this->mhs   = new Mahasiswa($conn);
        $this->prodi = new Prodi($conn);
    }

    public function index() {
        $data = $this->mhs->all();
        include 'views/mahasiswa/index.php';
    }

    public function create() {
        $prodi = $this->prodi->all();
        include 'views/mahasiswa/create.php';
    }

    public function store() {
        $this->mhs->create($_POST);
        header("Location: index.php?page=mahasiswa");
    }

    public function edit() {
        $mahasiswa = $this->mhs->find($_GET['id']);
        $prodi     = $this->prodi->all();
        include 'views/mahasiswa/edit.php';
    }

    public function update() {
        $this->mhs->update($_POST['id'], $_POST);
        header("Location: index.php?page=mahasiswa");
    }

    public function delete() {
        $this->mhs->delete($_GET['id']);
        header("Location: index.php?page=mahasiswa");
    }
}
