<!DOCTYPE html>
<html>
<head><title>Data Mahasiswa</title></head>
<body>
<h2>Data Mahasiswa</h2>
<a href="index.php?page=mahasiswa_create">Tambah Mahasiswa</a> |
<a href="index.php?page=prodi">Data Prodi</a> |
<a href="index.php?page=logout">Logout</a>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th><th>NIM</th><th>Nama</th><th>Prodi</th>
    <th>Telepon</th><th>Email</th><th>Aksi</th>
</tr>
<?php while($row = mysqli_fetch_assoc($data)): ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['nama_prodi']; ?></td>
    <td><?= $row['telepon']; ?></td>
    <td><?= $row['email']; ?></td>
    <td>
        <a href="index.php?page=mahasiswa_edit&id=<?= $row['id']; ?>">Edit</a> |
        <a href="index.php?page=mahasiswa_delete&id=<?= $row['id']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
