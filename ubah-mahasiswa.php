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

$title = 'Ubah Mahasiswa';

include 'layout/header.php';

//check apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa Berhasil Diubah');
                document.location.href = 'mahasiswa.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Mahasiswa Gagal Diubah');
                document.location.href = 'mahasiswa.php';
                </script>";
    }
}

//ambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

//query ambil data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>

<div class="container mt-5">
    <h1><i class="fas fa-user-graduate"></i> Ubah Data Mahasiswa</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa.." autocomplete="off" required value="<?= $mahasiswa['nama']; ?>">
        </div>

        <div class="row">
            <div class="mb-3 col-6"> <!-- col-6 membagi menjadi 2 bagian -->
                <label for="prodi" class="form-label">Program Studi</label>
                <select name="prodi" id="prodi" class="form-control" required>
                    <?= $prodi = $mahasiswa['prodi']; ?>
                    <option value="Teknik Informatika" <?= $prodi == "Teknik Informatika" ? 'selected' : null ?>>Teknik Informatika</option>
                    <option value="Teknik Mesin" <?= $prodi == "Teknik Mesin" ? 'selected' : null ?>>Teknik Mesin</option>
                    <option value="Teknik Arsitektur" <?= $prodi == "Teknik Arsitektur" ? 'selected' : null ?>>Teknik Arsitektur</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                    <?= $jk = $mahasiswa['jk']; ?>
                    <option value="laki-laki" <?= $jk == "laki-laki" ? 'selected' : null ?>>Laki-laki</option>
                    <option value="perempuan" <?= $jk == "perempuan" ? 'selected' : null ?>>Perempuan</option>
                </select>
            </div>

            <div class="mb-3 col-6">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="No Telepon.." autocomplete="off" required value="<?= $mahasiswa['telepon']; ?>">
            </div>

            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <textarea name="alamat" id="alamat"><?= $mahasiswa['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email.." autocomplete="off" required value="<?= $mahasiswa['email']; ?>">
            </div>

            <div class="mb-3 col-6">
                <label for="foto" class="form-label">foto</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto.." autocomplete="off" onchange="previewImg()">
                <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">

            </div>

        </div>
        <button type="submit" name="ubah" class="btn btn-success" style="float: right;"><i class="far fa-edit"></i> Ubah</button>
    </form>
</div>

<script>
    //preview image
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php
include 'layout/footer.php';
?>