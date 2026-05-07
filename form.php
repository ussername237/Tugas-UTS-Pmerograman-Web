<?php
include 'koneksi.php';

$id = "";
$nim = "";
$nama = "";
$jurusan = "";
$foto = "";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");

    $data = mysqli_fetch_assoc($query);

    $nim = $data['nim'];
    $nama = $data['nama_lengkap'];
    $jurusan = $data['jurusan'];
    $foto = $data['foto'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2><?= isset($_GET['id']) ? 'Edit' : 'Tambah'; ?> Data Mahasiswa</h2>

<form action="simpan.php" method="POST" enctype="multipart/form-data" onsubmit="return validasiForm()">

    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="hidden" name="foto_lama" value="<?= $foto; ?>">

    <label>NIM</label>
    <input type="text" name="nim" id="nim" value="<?= $nim; ?>">

    <label>Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama" value="<?= $nama; ?>">

    <label>Jurusan</label>
    <input type="text" name="jurusan" id="jurusan" value="<?= $jurusan; ?>">

    <label>Foto</label>
    <input type="file" name="foto" id="foto">

    <?php if($foto != ""){ ?>
        <img src="uploads/<?= $foto; ?>" width="100">
    <?php } ?>

    <br><br>

    <button type="submit" class="tambah">Simpan</button>

</form>

</div>

<script>

function validasiForm(){

    let nim = document.getElementById("nim").value;
    let nama = document.getElementById("nama").value;
    let jurusan = document.getElementById("jurusan").value;
    let foto = document.getElementById("foto").files[0];

    if(nim == "" || nama == "" || jurusan == ""){
        alert("Semua field wajib diisi!");
        return false;
    }

    if(foto){

        let ekstensi = ['image/jpeg', 'image/jpg', 'image/png'];

        if(!ekstensi.includes(foto.type)){
            alert("File harus JPG, JPEG, atau PNG!");
            return false;
        }

        if(foto.size > 2 * 1024 * 1024){
            alert("Ukuran file maksimal 2 MB!");
            return false;
        }
    }

    return true;
}

</script>

</body>
</html>