<?php
include "connect.php";

$id = isset($_POST['id_reg']) ? htmlentities($_POST['id_reg']) : "";

if (!empty($_POST['delete_reg_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_pendaftaran WHERE id_reg='$id'");

    if ($query) {
        $message = '<script>alert("Data berhasil dihapus"); window.location="../pendaftar";</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus: ' . mysqli_error($conn) . '"); window.location="../pendaftar";</script>';
    }
}
echo $message;
exit;
