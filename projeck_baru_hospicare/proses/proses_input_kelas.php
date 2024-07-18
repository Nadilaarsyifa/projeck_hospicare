<?php
include "connect.php";

$kategori = isset($_POST['kategori']) ? htmlentities($_POST['kategori']) : "";
$fasilitas = isset($_POST['fasilitas']) ? htmlentities($_POST['fasilitas']) : "";
$kode = isset($_POST['kode']) ? htmlentities($_POST['kode']) : "";


$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['input_kelas_validate'])) {
    $statusupload = 1;

    if ($statusupload == 1) {
        $select = mysqli_query($conn, "SELECT * FROM tb_kelaskamar WHERE kategori ='$kategori'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("kategori yang dimasukkan telah ada"); window.location="../informasikamar";</script>';
        } else {
            $query = mysqli_query($conn, "INSERT INTO tb_kelaskamar (kategori, fasilitas, kode ) VALUES ('$kategori','$fasilitas','$kode')");

            if ($query) {
                $message = '<script>alert("Data berhasil dimasukkan"); window.location="../informasikamar";</script>';
            } else {
                $message = '<script>alert("Data gagal dimasukkan"); window.location="../informasikamar";</script>';
            }
        }
    }
}
echo $message;
