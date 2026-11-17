<h2>Tambah Mahasiswa</h2>
<form method="POST" action="index.php?page=mahasiswa_store">
    NIM: <input type="text" name="nim"><br>
    Nama: <input type="text" name="nama"><br>
    Alamat: <textarea name="alamat"></textarea><br>
    Telepon: <input type="text" name="telepon"><br>
    Email: <input type="email" name="email"><br>
    Jenis Kelamin:
    <select name="jk">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br>
    Tgl Lahir: <input type="date" name="tgl_lahir"><br>
    Prodi:
    <select name="prodi_id">
        <?php while($p = mysqli_fetch_assoc($prodi)): ?>
            <option value="<?= $p['id']; ?>"><?= $p['nama_prodi']; ?></option>
        <?php endwhile; ?>
    </select><br>
    <button type="submit">Simpan</button>
</form>
<a href="index.php?page=mahasiswa">Kembali</a>
