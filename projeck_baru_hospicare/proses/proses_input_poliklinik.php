<?php
include "connect.php";

$id_poli = isset($_POST['id_poli']) ? htmlentities($_POST['id_poli']) : "";
$nama_poli = isset($_POST['nama_poli']) ? htmlentities($_POST['nama_poli']) : "";
$keterangan = isset($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : "";

$message = "";  // Inisialisasi variabel $message

if (isset($_POST['input_poliklinik_validate'])) {
    $statusupload = 1;
    $target_dir = "../assets/img/";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $original_filename = basename($_FILES['foto']['name']);
        $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        $unique_filename = pathinfo($original_filename, PATHINFO_FILENAME) . '_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $unique_filename;

        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            $message =  '<script>alert("Ini bukan file gambar"); window.location="../poliklinik";</script>';
            $statusupload = 0;
        } else {
            if ($_FILES['foto']['size'] > 50000000) { // 50MB
                $message = '<script>alert("File foto yang diupload terlalu besar"); window.location="../poliklinik";</script>';
                $statusupload = 0;
            } else {
                if ($file_extension != "jpeg" && $file_extension != "png" && $file_extension != "jpg" && $file_extension != "gif") {
                    $message = '<script>alert("Maaf, hanya diperbolehkan gambar yang memiliki format jpeg, png, jpg, dan gif"); window.location="../poliklinik";</script>';
                    $statusupload = 0;
                }
            }
        }

        if ($statusupload == 1) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $foto_name = $unique_filename;
            } else {
                $message = '<script>alert("Maaf terjadi kesalahan file tidak dapat di upload"); window.location="../poliklinik";</script>';
                $statusupload = 0;
            }
        }
    }

    if ($statusupload == 1) {
        $select = mysqli_query($conn, "SELECT * FROM tb_poliklinik WHERE id_poli = '$id_poli'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("ID poliklinik yang dimasukkan telah ada"); window.location="../poliklinik";</script>';
        } else {
            $query = mysqli_query($conn, "INSERT INTO tb_poliklinik (foto, id_poli, nama_poli, keterangan) VALUES ('$foto_name', '$id_poli', '$nama_poli','$keterangan')");

            if ($query) {
                $message = '<script>alert("Data berhasil dimasukkan"); window.location="../poliklinik";</script>';
            } else {
                $message = '<script>alert("Data gagal dimasukkan"); window.location="../poliklinik";</script>';
            }
        }
    }
}
echo $message;
