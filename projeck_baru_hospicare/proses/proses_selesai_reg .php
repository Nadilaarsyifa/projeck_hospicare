<?php
include "connect.php";

$id_selesai = isset($_POST['id_pendaftaran']) ? mysqli_real_escape_string($conn, htmlentities($_POST['id_pendaftaran'])) : "";
$alasan_selesai = isset($_POST['keterangan_selesai']) ? mysqli_real_escape_string($conn, htmlentities($_POST['keterangan_selesai'])) : "";
$status_selesai = isset($_POST['status_selesai']) ? mysqli_real_escape_string($conn, htmlentities($_POST['status_selesai'])) : "";

$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['batalkan_reg_validate'])) {
    $statusupload = 1;

    if ($statusupload == 1) {
        // Query untuk memasukkan data ke tb_pembatalan
        $query_insert = mysqli_query($conn, "INSERT INTO tb_pembatalan (id_pendaftaran, keterangan_selesai, status_selesai) VALUES ('$id_selesai', '$alasan_selesai', '$status_selesai')");

        if ($query_insert) {
            // Jika query insert berhasil, lanjutkan dengan query update
            $query_update = mysqli_query($conn, "UPDATE tb_pendaftaran SET status=3 WHERE id_reg='$id_selesai'");

            if ($query_update) {
                $message = '<script>alert("Registrasi dibatalkan dan status diperbarui"); window.location="../pendaftar";</script>';
            } else {
                $message = '<script>alert("Registrasi dibatalkan tetapi gagal memperbarui status"); window.location="../pendaftar";</script>';
            }
        } else {
            $message = '<script>alert("Gagal membatalkan registrasi"); window.location="../pendaftar";</script>';
        }
    }
}
echo $message;
