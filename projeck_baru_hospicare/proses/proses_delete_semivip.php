<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['delete_semivip_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tbbaru WHERE id='$id'");

    if ($query) {
        $message = '<script>alert("Data berhasil dihapus"); window.location="../kamarsemivip";</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus: ' . mysqli_error($conn) . '"); window.location="../kamarsemivip";</script>';
    }
}
echo $message;
exit;
