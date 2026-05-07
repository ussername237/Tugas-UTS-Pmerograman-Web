<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Data Mahasiswa</h2>

<a href="form.php" class="tambah">+ Tambah Data</a>

<table>
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>NIM</th>
        <th>Nama Lengkap</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?= $no++; ?></td>

    <td>
        <img src="uploads/<?= $row['foto']; ?>" width="80">
    </td>

    <td><?= $row['nim']; ?></td>
    <td><?= $row['nama_lengkap']; ?></td>
    <td><?= $row['jurusan']; ?></td>

    <td>
        <a href="form.php?id=<?= $row['id']; ?>" class="edit">Edit</a>

        <a href="hapus.php?id=<?= $row['id']; ?>"
           class="hapus"
           onclick="return confirm('Yakin ingin menghapus data ini?')">
           Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>