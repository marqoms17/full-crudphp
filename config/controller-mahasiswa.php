<?php

//fungsi menampilkan data
function select($query)
{
    //panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//fungsi menambahkan data mahasiswa
function create_mahasiswa($post)
{
    global $db;

    $prodi      = strip_tags($post['prodi']);
    $nama       = strip_tags($post['nama']);
    $jk         = strip_tags($post['jk']);
    $telepon    = strip_tags($post['telepon']);
    $alamat     = $post['alamat'];
    $email      = strip_tags($post['email']);
    $foto       = upload_file();

    //check upload foto
    if (!$foto) {
        return false;
    }

    //query tambah data mahasiswa
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$alamat', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi menghapus data mahasiswa
function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    //ambil foto sesuai data yang dipilih
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("assets/img/" . $foto['foto']);

    //query hapus data mahasiswa
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengubah data mahasiswa
function update_mahasiswa($post)
{
    global $db;

    $id_mahasiswa   = strip_tags($post['id_mahasiswa']);
    $nama           = strip_tags($post['nama']);
    $prodi          = strip_tags($post['prodi']);
    $jk             = strip_tags($post['jk']);
    $telepon        = strip_tags($post['telepon']);
    $alamat         = $post['alamat'];
    $email          = strip_tags($post['email']);
    $fotoLama       = strip_tags($post['fotoLama']);

    //check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    //query update data mahasiswa
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', alamat = '$alamat', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengupload file
function upload_file()
{
    $namaFile       = $_FILES['foto']['name'];
    $ukuranFile     = $_FILES['foto']['size'];
    $error          = $_FILES['foto']['error'];
    $tmpName        = $_FILES['foto']['tmp_name'];

    //check file yang diupload
    $extensifileValid   = ['jpg', 'jpeg', 'png'];
    $extensifile        = explode('.', $namaFile);
    $extensifile        = strtolower(end($extensifile));

    //check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {
        //pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    //check ukuran file max 2MB
    if ($ukuranFile > 2048000) {
        //pesan gagal
        echo "<script>
        alert('Ukuran file max 2 MB');
        document.location.href = 'tambah-mahasiswa.php';
        </script>";
        die();
    }

    //generate file baru
    $namaFileBaru   = uniqid();
    $namaFileBaru   .= '.';
    $namaFileBaru   .= $extensifile;

    //pindahkan ke folder lokal
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}
