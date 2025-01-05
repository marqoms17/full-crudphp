<?php
// Pastikan tidak ada output sebelum session_start()
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Menghapus semua data sesi
session_unset();

// Menghancurkan session
session_destroy();

// Pastikan header diatur sebelum output lainnya
header("Location: login.php");
exit();
