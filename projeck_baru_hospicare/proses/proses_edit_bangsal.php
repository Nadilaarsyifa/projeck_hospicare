<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";
$no_kamar = isset($_POST['no_kamar']) ? htmlentities($_POST['no_kamar']) : "";
$nama_kamar = isset($_POST['nama_kamar']) ? htmlentities($_POST['nama_kamar']) : "";
$kapasitas = isset($_POST['kapasitas']) ? htmlentities($_POST['kapasitas']) : "";
$terisi = isset($_POST['terisi']) ? htmlentities($_POST['terisi']) : "";
$status = isset($_POST['status_kamar']) ? htmlentities($_POST['status_kamar']) : "";
$fasilitas = isset($_POST['fasilitas']) ? htmlentities($_POST['fasilitas']) : "";


$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['edit_bangsal_validate'])) {
    $statusupload = 1;
    $target_dir = "../assets/img/";

    if ($statusupload == 1) {
        // Memperbaiki query update
        $query = mysqli_query($conn, "UPDATE tb_bangsal SET  terisi='$terisi', status_kamar='$status' WHERE id='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate"); window.location="../bangsal";</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate"); window.location="../bangsal";</script>';
        }
    }
}
echo $message;
