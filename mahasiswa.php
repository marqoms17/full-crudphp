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

$title = "Daftar Mahasiswa";
include 'layout/header.php';


//menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>

<div class="container mt-5">
    <h1><i class="fas fa-user-graduate"></i> Data Mahasiswa</h1>
    <hr>
    <?php if ($_SESSION['level'] == 1) : ?>
        <a href="tambah-mahasiswa.php" class="btn btn-primary mt-1 mb-1"> <i class="fas fa-user-plus"></i> Tambah</a>

        <a href="download-excel-mahasiswa.php" class="btn btn-success mt-1 mb-1"> <i class="fas fa-file-excel"></i> Download Excel</a>

        <a href="download-pdf-mahasiswa.php" class="btn btn-danger mt-1 mb-1"> <i class="fas fa-file-pdf"></i> Download PDF</a>
    <?php endif; ?>
    <table class="table table-bordered table-striped" mt-3 id="table">
        <thead>

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        <tbody>
            <?php $no = 1 ?> <!--id mahasiswa -->
            <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mahasiswa['nama']; ?></td>
                    <td><?= $mahasiswa['prodi']; ?></td>
                    <td><?= $mahasiswa['jk']; ?></td>
                    <td><?= $mahasiswa['telepon']; ?></td>
                    <td class="text-center" width="20%">
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm"> <i class="far fa-eye"></i> Detail</a>

                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm"> <i class="far fa-edit"></i> Ubah</a>

                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data mahasiswa <?= $mahasiswa['nama'] ?> akan dihapus?')"><i class="far fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
        </thead>
    </table>
</div>


<?php

include 'layout/footer.php';
