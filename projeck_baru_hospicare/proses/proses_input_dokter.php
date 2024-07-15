<?php
include "connect.php";

$Id_dokter = isset($_POST['Id_dokter']) ? htmlentities($_POST['Id_dokter']) : "";
$nama_dokter = isset($_POST['nama_dokter']) ? htmlentities($_POST['nama_dokter']) : "";
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? htmlentities($_POST['jenis_kelamin']) : "";
$spesialis = isset($_POST['spesialis']) ? htmlentities($_POST['spesialis']) : "";
$jadwal_praktik = isset($_POST['jadwal_praktik']) ? htmlentities($_POST['jadwal_praktik']) : "";
$nohp = isset($_POST['nohp']) ? htmlentities($_POST['nohp']) : "";
$keterangan = isset($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : "";

$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imagetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['input_dokter_validate'])) {
    // Cek apakah gambar atau bukan 
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek === false) {
        $message = "Ini bukan file gambar.";
        $statusupload = 0;
    } else {
        $statusupload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, file yang dimasukkan telah ada.";
            $statusupload = 0;
        } else {
            if ($_FILES['foto']['size'] > 50000000) { // 50MB
                $message = "File foto yang diupload terlalu besar.";
                $statusupload = 0;
            } else {
                if ($imagetype != "jpeg" && $imagetype != "png" && $imagetype != "jpg" && $imagetype != "gif") {
                    $message = "Maaf, hanya diperbolehkan gambar yang memiliki format jpeg, png, jpg, dan gif.";
                    $statusupload = 0;
                }
            }
        }
    }

    if ($statusupload == 0) {
        $message = '<script>alert("' . $message . ' gambar tidak dapat di upload"); window.location="../dokter";</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM tb_dokter WHERE Id_dokter = '$Id_dokter'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("ID dokter yang dimasukkan telah ada"); window.location="../dokter";</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "INSERT INTO tb_dokter (foto, Id_dokter, nama_dokter, jenis_kelamin, spesialis, jadwal_praktik, nohp, keterangan) VALUES ('" . basename($_FILES['foto']['name']) . "','$Id_dokter','$nama_dokter','$jenis_kelamin','$spesialis','$jadwal_praktik','$nohp','$keterangan')");

                if ($query) {
                    $message = '<script>alert("Data berhasil dimasukkan"); window.location="../dokter";</script>';
                } else {
                    $message = '<script>alert("Data gagal dimasukkan"); window.location="../dokter";</script>';
                }
            } else {
                $message = '<script>alert("Maaf terjadi kesalahan file tidak dapat di upload"); window.location="../dokter";</script>';
            }
        }
    }
}
echo $message;
