<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";

$message = "";  //  Inisialisasi variabel $message

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_user SET password=md5('password')  WHERE id='$id'");

    if ($query) {
        $message = '<script>alert("password berhasil di reset"); window.location="../user"</script>';
    } else {
        $message = '<script>alert("password gagal di reset")</script>';
    }
}

echo $message;
