<?php
include "connect.php";

$kategori = isset($_POST['kategori']) ? htmlentities($_POST['kategori']) : "";

if (!empty($_POST['delete_kelas_validate'])) {
    // Periksa apakah data terkait ada di tabel lain
    $check_related_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM tbbaru WHERE kategori='$kategori'");
    $check_related_result = mysqli_fetch_assoc($check_related_query);

    if ($check_related_result['count'] > 0) {
        // Data terkait ditemukan, tampilkan pesan kesalahan
        $message = '<script>alert("Data tidak dapat dihapus karena terkait dengan tabel lain."); window.location="../informasikamar";</script>';
    } else {
        // Tidak ada data terkait, lanjutkan dengan penghapusan
        $query = mysqli_query($conn, "DELETE FROM tb_kelaskamar WHERE kategori='$kategori'");

        if ($query) {
            $message = '<script>alert("Data berhasil dihapus"); window.location="../informasikamar";</script>';
        } else {
            $message = '<script>alert("Data gagal dihapus: ' . mysqli_error($conn) . '"); window.location="../informasikamar";</script>';
        }
    }
}
echo $message;
exit;
