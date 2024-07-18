<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['delete_vip_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tbbaru WHERE id='$id'");

    if ($query) {
        $message = '<script>alert("Data berhasil dihapus"); window.location="../kamarvip";</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus: ' . mysqli_error($conn) . '"); window.location="../kamarvip";</script>';
    }
}
echo $message;
exit;
