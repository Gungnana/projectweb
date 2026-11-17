<?php
require_once 'models/Prodi.php';

class ProdiController {
    private $prodi;

    public function __construct($conn) {
        $this->prodi = new Prodi($conn);
    }

    public function index() {
        $data = $this->prodi->all();
        include 'views/prodi/index.php';
    }

    public function create() {
        include 'views/prodi/create.php';
    }

    public function store() {
        $this->prodi->create($_POST['nama_prodi'], $_POST['jenjang'], $_POST['singkatan']);
        header("Location: index.php?page=prodi");
    }

    public function edit() {
        $prodi = $this->prodi->find($_GET['id']);
        include 'views/prodi/edit.php';
    }

    public function update() {
        $this->prodi->update($_POST['id'], $_POST['nama_prodi'], $_POST['jenjang'], $_POST['singkatan']);
        header("Location: index.php?page=prodi");
    }

    public function delete() {
        $this->prodi->delete($_GET['id']);
        header("Location: index.php?page=prodi");
    }
}
