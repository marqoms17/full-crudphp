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

//membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION['level'] != 2) {
  echo "<script>
          document.location.href = 'mahasiswa.php';
        </script>";
  exit;
}

$title = "Daftar Barang";

include 'layout/header.php';

$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC") //pilih table barang dari database crud-php dan diurutkan secara descending

?>

<div class="container mt-5">
  <h1><i class="fas fa-list"></i> Data Barang</h1>
  <hr>
  <a href="tambah-barang.php" class="btn btn-primary mt-1 mb-1"> <i class="fas fa-plus"></i> Tambah</a>

  <table class="table table-bordered table-striped" mt-3 id="table">
    <thead>

      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Barcode</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    <tbody>
      <?php $no = 1 ?> <!--id barang -->
      <?php foreach ($data_barang as $barang) : ?> <!--perulangan untuk kolom data-data di tabel database -->
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $barang['nama'] ?></td>
          <td><?= $barang['jumlah'] ?></td>
          <td class="text-center">Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
          <td class="text-center">
            <img alt="barcode" src="barcode.php?codetype=Code128&size=15&text=<?= $barang['barcode']; ?>&print=true ">
          </td>
          <td><?= date('d/m/Y H:i:s', strtotime($barang['tanggal'])); ?></td>
          <td width="20%" class="text-center">
            <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success"> <i class="far fa-edit"></i> Ubah</a>
            <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data barang akan dihapus?')" ;> <i class="far fa-trash-alt"></i> Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
    </thead>
  </table>
</div>

<?php include 'layout/footer.php';
