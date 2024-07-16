<?php
include "connect.php"; // Pastikan file ini berisi koneksi ke database

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['delete_poliklinik_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_poliklinik WHERE id='$id'");

    if ($query) {
        $message = '<script>alert("Data berhasil dihapus"); window.location="../poliklinik";</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus: ' . mysqli_error($conn) . '"); window.location="../poliklinik";</script>';
    }
}
echo $message;
exit;
