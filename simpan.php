<?php
include 'koneksi.php';

$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama_lengkap'];
$jurusan = $_POST['jurusan'];
$foto_lama = $_POST['foto_lama'];

$namaFoto = $foto_lama;

if($_FILES['foto']['name'] != ""){

    $file = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    $ext = pathinfo($file, PATHINFO_EXTENSION);

    $namaFoto = time() . "." . $ext;

    move_uploaded_file($tmp, "uploads/" . $namaFoto);
}

if($id == ""){

    mysqli_query($conn, "INSERT INTO mahasiswa
    (nim, nama_lengkap, jurusan, foto)
    VALUES
    ('$nim','$nama','$jurusan','$namaFoto')");

    echo "
    <script>
        alert('Data berhasil ditambahkan');
        window.location='index.php';
    </script>
    ";

}else{

    mysqli_query($conn, "UPDATE mahasiswa SET
        nim='$nim',
        nama_lengkap='$nama',
        jurusan='$jurusan',
        foto='$namaFoto'
        WHERE id='$id'
    ");

    echo "
    <script>
        alert('Data berhasil diupdate');
        window.location='index.php';
    </script>
    ";
}
?>