<?php
session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Silahkan Login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}

$title = "Detail Mahasiswa";

include 'layout/header.php';

// mengambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

//menampilkan data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
?>

<div class="container mt-5">
    <h1><i class="far fa-user"></i> Data <?= $mahasiswa['nama']; ?></h1>
    <hr>
    <table class="table table-bordered table-striped" mt-3>
        <tr>
            <td width="25%"></td>
            <td>
                <a href="assets/img/<?= $mahasiswa['foto'] ?>">
                    <img src="assets/img/<?= $mahasiswa['foto'] ?>" alt="foto" width="20%">
                </a>
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?= $mahasiswa['nama']; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: <?= $mahasiswa['prodi']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $mahasiswa['jk']; ?></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>: <?= $mahasiswa['telepon']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $mahasiswa['alamat']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?= $mahasiswa['email']; ?></td>
        </tr>
    </table>
    <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float: right;"> <i class="fas fa-arrow-left"></i> Kembali</a>

</div>


<?php

include 'layout/footer.php';
