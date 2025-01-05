<?php
//fungsi menambahkan data akun
function create_akun($post)
{
    global $db;

    $nama       = strip_tags($post['nama']);
    $username   = strip_tags($post['username']);
    $email      = strip_tags($post['email']);
    $password   = strip_tags($post['password']);
    $level      = strip_tags($post['level']);

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query tambah data akun
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    //query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengubah data akun
function update_akun($post)
{
    global $db;

    $id_akun        = strip_tags($post['id_akun']);
    $nama           = strip_tags($post['nama']);
    $username       = strip_tags($post['username']);
    $email          = strip_tags($post['email']);
    $password       = strip_tags($post['password']);
    $level          = strip_tags($post['level']);

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query update data akun
    $query = "UPDATE akun SET nama = '$nama', username = '$username', password = '$password', level = '$level', email = '$email' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
