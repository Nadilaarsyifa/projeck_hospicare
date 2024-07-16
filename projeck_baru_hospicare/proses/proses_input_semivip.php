<?php
include "connect.php";

$no_kamar = isset($_POST['no_kamar']) ? htmlentities($_POST['no_kamar']) : "";
$nama_kamar = isset($_POST['nama_kamar']) ? htmlentities($_POST['nama_kamar']) : "";
$kapasitas = isset($_POST['kapasitas']) ? htmlentities($_POST['kapasitas']) : "";
$terisi = isset($_POST['terisi']) ? htmlentities($_POST['terisi']) : "";
$status = isset($_POST['status_kamar']) ? htmlentities($_POST['status_kamar']) : "";
$fasilitas = isset($_POST['fasilitas']) ? htmlentities($_POST['fasilitas']) : "";


$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['input_kamar_validate'])) {
    $statusupload = 1;
    $target_dir = "../assets/img/";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $original_filename = basename($_FILES['foto']['name']);
        $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        $unique_filename = pathinfo($original_filename, PATHINFO_FILENAME) . '_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $unique_filename;

        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            $message =  '<script>alert("Ini bukan file gambar"); window.location="../kamarsemivip";</script>';
            $statusupload = 0;
        } else {
            if ($_FILES['foto']['size'] > 50000000) { // 50MB
                $message = '<script>alert("File foto yang diupload terlalu besar"); window.location="../kamarsemivip";</script>';
                $statusupload = 0;
            } else {
                if ($file_extension != "jpeg" && $file_extension != "png" && $file_extension != "jpg" && $file_extension != "gif") {
                    $message = '<script>alert("Maaf, hanya diperbolehkan gambar yang memiliki format jpeg, png, jpg, dan gif"); window.location="../kamarsemivip";</script>';
                    $statusupload = 0;
                }
            }
        }

        if ($statusupload == 1) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $foto_name = $unique_filename;
            } else {
                $message = '<script>alert("Maaf terjadi kesalahan file tidak dapat di upload"); window.location="../kamarsemivip";</script>';
                $statusupload = 0;
            }
        }
    }

    if ($statusupload == 1) {
        $select = mysqli_query($conn, "SELECT * FROM tb_kamarsemivip WHERE no_kamar = '$no_kamar'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("no kamar yang dimasukkan telah ada"); window.location="../kamarsemivip";</script>';
        } else {
            $query = mysqli_query($conn, "INSERT INTO tb_kamarsemivip (foto, no_kamar, nama_kamar, kapasitas,terisi, status_kamar, fasilitas) VALUES ('$foto_name','$no_kamar','$nama_kamar','$kapasitas', '$terisi', '$status', '$fasilitas')");

            if ($query) {
                $message = '<script>alert("Data berhasil dimasukkan"); window.location="../kamarsemivip";</script>';
            } else {
                $message = '<script>alert("Data gagal dimasukkan"); window.location="../kamarsemivip";</script>';
            }
        }
    }
}
echo $message;
