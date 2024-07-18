<?php
session_start();
include "connect.php";

$nama = isset($_POST['nama']) ? htmlentities($_POST['nama']) : "";
$nohp = isset($_POST['nohp']) ? htmlentities($_POST['nohp']) : "";
$alamat = isset($_POST['alamat']) ? htmlentities($_POST['alamat']) : "";

$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['ubah_profil_validate'])) {
    $statusupload = 1;
    $target_dir = "../assets/img/";

    // Cek apakah file telah diunggah
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $original_filename = basename($_FILES['foto']['name']);
        $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        $unique_filename = pathinfo($original_filename, PATHINFO_FILENAME) . '_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $unique_filename;

        // Cek apakah file adalah gambar
        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            $message = '<script>alert("Ini bukan file gambar"); window.history.back()</script>';
            $statusupload = 0;
        } else {
            if ($_FILES['foto']['size'] > 50000000) { // 50MB
                $message = '<script>alert("File foto yang diupload terlalu besar"); window.history.back()</script>';
                $statusupload = 0;
            } else {
                if ($file_extension != "jpeg" && $file_extension != "png" && $file_extension != "jpg" && $file_extension != "gif") {
                    $message = '<script>alert("Maaf, hanya diperbolehkan gambar yang memiliki format jpeg, png, jpg, dan gif"); window.history.back()</script>';
                    $statusupload = 0;
                }
            }
        }

        if ($statusupload == 1) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $foto_name = $unique_filename;
            } else {
                $message = '<script>alert("Maaf terjadi kesalahan file tidak dapat di upload"); window.history.back()</script>';
                $statusupload = 0;
            }
        }
    } else {
        $foto_name = $row['foto'];
    }

    if ($statusupload == 1) {
        $query = mysqli_query($conn, "UPDATE tb_dokter SET foto='$foto_name', nama='$nama', nohp='$nohp', alamat='$alamat' WHERE username = '$_SESSION[username_hospicare]'");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate"); window.history.back()</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate"); window.history.back()</script>';
        }
    }
}
echo $message;
