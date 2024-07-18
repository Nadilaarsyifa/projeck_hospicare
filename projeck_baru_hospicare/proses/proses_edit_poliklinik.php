<?php
include "connect.php"; // Pastikan file ini berisi koneksi ke database

$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";
$id_poli = isset($_POST['id_poli']) ? htmlentities($_POST['id_poli']) : "";
$nama_poli = isset($_POST['nama_poli']) ? htmlentities($_POST['nama_poli']) : "";
$keterangan = isset($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : "";



$message = "";  // Inisialisasi variabel $message
if (!empty($_POST['edit_validate'])) {
    $statusupload = 1;
    $target_dir = "../assets/img/";
    $foto_name = "";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $original_filename = basename($_FILES['foto']['name']);
        $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
        $unique_filename = pathinfo($original_filename, PATHINFO_FILENAME) . '_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $unique_filename;

        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if ($cek === false) {
            echo '<script>alert("Ini bukan file gambar"); window.location="../poliklinik";</script>';
        } elseif ($_FILES['foto']['size'] > 50000000) {
            echo '<script>alert("File foto yang diupload terlalu besar"); window.location="../poliklinik";</script>';
        } elseif (!in_array($file_extension, ["jpeg", "png", "jpg", "gif"])) {
            echo '<script>alert("Maaf, hanya diperbolehkan gambar yang memiliki format jpeg, png, jpg, dan gif"); window.location="../poliklinik";</script>';
        } elseif (!move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            echo '<script>alert("Maaf terjadi kesalahan file tidak dapat di upload"); window.location="../poliklinik";</script>';
        } else {
            $foto_name = $unique_filename;
        }
    } else {
        $query_select = mysqli_query($conn, "SELECT foto FROM tb_poliklinik WHERE id='$id'");
        $poli = mysqli_fetch_assoc($query_select);
        $foto_name = isset($poli['foto']) ? $poli['foto'] : 'default.jpg';
    }

    $update_query = "UPDATE tb_poliklinik SET foto='$foto_name', id_poli='$id_poli', nama_poli='$nama_poli', keterangan='$keterangan' WHERE id='$id'";

    if (mysqli_query($conn, $update_query)) {
        echo '<script>alert("Data berhasil diupdate"); window.location="../poliklinik";</script>';
    } else {
        echo '<script>alert("Data gagal diupdate: ' . mysqli_error($conn) . '"); window.location="../poliklinik";</script>';
    }
}
