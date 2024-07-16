<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

$message = "";  //  Inisialisasi variabel $message

if (!empty($_POST['delete_dokter_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_dokter WHERE id='$id'");

    if ($query) {
        $message = '<script>alert("dokter berhasil di hapus"); window.location="../dokter"</script>';
    } else {
        $message = '<script>alert("dokter gagal di hapus");window.location="../dokter"</script>';
    }
}

echo $message;
