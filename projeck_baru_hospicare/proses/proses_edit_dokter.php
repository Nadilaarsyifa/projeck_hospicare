<?php
include "connect.php";

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";
$Id_dokter = isset($_POST['Id_dokter']) ? htmlentities($_POST['Id_dokter']) : "";
$nama_dokter = isset($_POST['nama_dokter']) ? htmlentities($_POST['nama_dokter']) : "";
$jenis_kelamin = isset($_POST['jenis_kelamin']) ? htmlentities($_POST['jenis_kelamin']) : "";
$spesialis = isset($_POST['spesialis']) ? htmlentities($_POST['spesialis']) : "";
$jadwal_praktik = isset($_POST['jadwal_praktik']) ? htmlentities($_POST['jadwal_praktik']) : "";
$pendidikan = isset($_POST['pendidikan']) ? htmlentities($_POST['pendidikan']) : "";
$nohp = isset($_POST['nohp']) ? htmlentities($_POST['nohp']) : "";
$keterangan = isset($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : "";

$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['input_dokter_validate'])) {
    $statusupload = 1;
    $target_dir = "../assets/img/";

    // Cek apakah file telah diunggah
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $original_filename = basename($_FILES['foto']['name']);
        $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        $unique_filename = pathinfo($original_filename, PATHINFO_FILENAME) . '_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $unique_filename;

        // Cek apakah file adalah gambar
        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            $message =  '<script>alert("Ini bukan file gambar"); window.location="../dokter";</script>';
            $statusupload = 0;
        } else {
            if ($_FILES['foto']['size'] > 50000000) { // 50MB
                $message = '<script>alert("File foto yang diupload terlalu besar"); window.location="../dokter";</script>';
                $statusupload = 0;
            } else {
                if ($file_extension != "jpeg" && $file_extension != "png" && $file_extension != "jpg" && $file_extension != "gif") {
                    $message = '<script>alert("Maaf, hanya diperbolehkan gambar yang memiliki format jpeg, png, jpg, dan gif"); window.location="../dokter";</script>';
                    $statusupload = 0;
                }
            }
        }

        if ($statusupload == 1) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $foto_name = $unique_filename;
            } else {
                $message = '<script>alert("Maaf terjadi kesalahan file tidak dapat di upload"); window.location="../dokter";</script>';
                $statusupload = 0;
            }
        }
    } else {
        // Tidak ada file yang diunggah, gunakan foto lama
        $foto_name = $row['foto'];
    }

    if ($statusupload == 1) {
        // Memperbaiki query update
        $query = mysqli_query($conn, "UPDATE tb_dokter SET foto='$foto_name', nama_dokter='$nama_dokter', jenis_kelamin='$jenis_kelamin', spesialis='$spesialis', jadwal_praktik='$jadwal_praktik', pendidikan='$pendidikan', nohp='$nohp', keterangan='$keterangan' WHERE id='$id'");

        if ($query) {
            $message = '<script>alert("Data berhasil diupdate"); window.location="../dokter";</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate"); window.location="../dokter";</script>';
        }
    }
}
echo $message;
