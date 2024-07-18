<?php
include "connect.php";

$id_kelas = isset($_POST['id_kelas']) ? htmlentities($_POST['id_kelas']) : "";

if (!empty($_POST['delete_kelas_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_kelaskamar WHERE id_kelas='$id_kelas'");

    if ($query) {
        $message = '<script>alert("Data berhasil dihapus"); window.location="../informasikamar";</script>';
    } else {
        $message = '<script>alert("Data gagal dihapus: ' . mysqli_error($conn) . '"); window.location="../informasikamar";</script>';
    }
}
echo $message;
exit;
