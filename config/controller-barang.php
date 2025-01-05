<?php

//fungsi menambahkan data barang
function create_barang($post)
{
    global $db;

    $nama   = strip_tags($post['nama']);
    $jumlah = strip_tags($post['jumlah']);
    $harga  = strip_tags($post['harga']);
    $barcode = rand(100000, 999999);

    //query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$barcode', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang  = $post['id_barang'];
    $nama       = $post['nama'];
    $jumlah     = $post['jumlah'];
    $harga      = $post['harga'];

    //query ubah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    //query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
