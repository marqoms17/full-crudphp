<?php

//render halaman menjadi json
header('Content-Type: Application/json');

require '../config/app.php';

$query = select("SELECT * FROM barang ORDER BY id_barang DESC");

echo json_encode(['data barang' => $query]);
