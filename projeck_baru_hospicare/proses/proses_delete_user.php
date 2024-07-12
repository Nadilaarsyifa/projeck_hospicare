<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

$message = "";  //  Inisialisasi variabel $message

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id='$id'");

    if ($query) {
        $message = '<script>alert("data berhasil di hapus"); window.location="../user"</script>';
    } else {
        $message = '<script>alert("data gagal di hapus")</script>';
    }
}

echo $message;
