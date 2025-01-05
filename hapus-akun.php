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

include "config/app.php";


//menerima id akun yang dipilih oleh pengguna
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0) {
    echo "<script>
            alert('Data akun Berhasil Dihapus');
            document.location.href = 'crud-modal.php';
        </script>";
} else {
    echo "<script>
            alert('Data akun Gagal Dihapus');
            document.location.href = 'crud-modal.php';
        </script>";
}
