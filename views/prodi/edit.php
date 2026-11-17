<h2>Edit Prodi</h2>
<form method="POST" action="index.php?page=prodi_update">
    <input type="hidden" name="id" value="<?= $prodi['id']; ?>">
    Nama Prodi: <input type="text" name="nama_prodi" value="<?= $prodi['nama_prodi']; ?>"><br>
    Jenjang: <input type="text" name="jenjang" value="<?= $prodi['jenjang']; ?>"><br>
    Singkatan: <input type="text" name="singkatan" value="<?= $prodi['singkatan']; ?>"><br>
    <button type="submit">Update</button>
</form>
<a href="index.php?page=prodi">Kembali</a>
