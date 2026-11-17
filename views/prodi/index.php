<!DOCTYPE html>
<html>
<head><title>Data Prodi</title></head>
<body>
<h2>Data Prodi</h2>
<a href="index.php?page=prodi_create">Tambah Prodi</a> |
<a href="index.php?page=mahasiswa">Data Mahasiswa</a> |
<a href="index.php?page=logout">Logout</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Nama Prodi</th><th>Jenjang</th><th>Singkatan</th><th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($data)): ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama_prodi']; ?></td>
        <td><?= $row['jenjang']; ?></td>
        <td><?= $row['singkatan']; ?></td>
        <td>
            <a href="index.php?page=prodi_edit&id=<?= $row['id']; ?>">Edit</a> |
            <a href="index.php?page=prodi_delete&id=<?= $row['id']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
