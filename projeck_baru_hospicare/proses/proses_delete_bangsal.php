<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['delete_vip_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_bangsal WHERE id='$id'");

    if ($query) {
        $message = '<script>alert("Data berhasil dihapus"); window.location="../bangsal";</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus: ' . mysqli_error($conn) . '"); window.location="../bangsal";</script>';
    }
}
echo $message;
exit;
