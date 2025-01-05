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

$title = 'Ubah Barang';

include 'layout/header.php';


//mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

//check apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
                alert('Data Barang Berhasil Diubah');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Diubah');
                document.location.href = 'index.php';
                </script>";
    }
}

?>

<div class="container mt-5">
    <h1><i class="far fa-folder"></i> Ubah barang</h1>
    <hr>
    <form action="" method="post">

        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama'] ?>" placeholder="Nama barang.." autocomplete="off" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah'] ?>" placeholder="Jumlah barang.." autocomplete="off" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga'] ?>" placeholder="harga barang.." autocomplete="off" required>
        </div>
        <button type="submit" name="ubah" class="btn btn-success" style="float: right;"><i class="far fa-edit"></i> Ubah</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>