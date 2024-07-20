<?php
include "connect.php";
$id_reg = isset($_POST['id_reg']) ? htmlentities($_POST['id_reg']) : "";
$feedback_adm = isset($_POST['feedback_adm']) ? htmlentities($_POST['feedback_adm']) : "";




$message = "";  // Inisialisasi variabel $message


if (!empty($_POST['edit_reg_validate'])) {
    $statusupload = 1;

    if ($statusupload == 1) {
        // Memperbaiki query update
        $query = mysqli_query($conn, "UPDATE tb_pendaftaran SET  feedback_adm='$feedback_adm' WHERE id_reg='$id_reg'");
        if ($query) {
            $message = '<script>alert("Berhasil Memberikan Feedback"); window.location="../pendaftar";</script>';
        } else {
            $message = '<script>alert("gagal Memberikan Feedback"); window.location="../pendaftar";</script>';
        }
    }
}
echo $message;
