<?php
include "connect.php";

$id_kelas = isset($_POST['id_kelas']) ? htmlentities($_POST['id_kelas']) : "";
$keterangan = isset($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : "";


$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['input_kelas_validate'])) {
    $statusupload = 1;

    if ($statusupload == 1) {
        $select = mysqli_query($conn, "SELECT * FROM tb_kelaskamar WHERE id_kelas ='$id_kelas'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("ID kelas yang dimasukkan telah ada"); window.location="../informasikamar";</script>';
        } else {
            $query = mysqli_query($conn, "INSERT INTO tb_kelaskamar (id_kelas, keterangan ) VALUES ('$id_kelas','$keterangan')");

            if ($query) {
                $message = '<script>alert("Data berhasil dimasukkan"); window.location="../informasikamar";</script>';
            } else {
                $message = '<script>alert("Data gagal dimasukkan"); window.location="../informasikamar";</script>';
            }
        }
    }
}
echo $message;
