<?php
include "connect.php";
$id_reg = isset($_POST['id_reg']) ? htmlentities($_POST['id_reg']) : "";
$feedback_adm = isset($_POST['feedback_adm']) ? htmlentities($_POST['feedback_adm']) : "";
$nik = isset($_POST['nik']) ? htmlentities($_POST['nik']) : "";
$nama_pasien = isset($_POST['nama_pasien']) ? htmlentities($_POST['nama_pasien']) : "";
$tgl_lahir = isset($_POST['tgl_lahir']) ? htmlentities($_POST['tgl_lahir']) : "";
$jns_kelamin = isset($_POST['jns_kelamin']) ? htmlentities($_POST['jns_kelamin']) : "";
$alamat_pasien = isset($_POST['alamat_pasien']) ? htmlentities($_POST['alamat_pasien']) : "";
$nohp_pas = isset($_POST['nohp_pas']) ? htmlentities($_POST['nohp_pas']) : "";
$rencana_janjitemu = isset($_POST['rencana_janji_temu']) ? htmlentities($_POST['rencana_janji_temu']) : "";
$nama_poli = isset($_POST['nama_poli']) ? htmlentities($_POST['nama_poli']) : "";
$jenis_pelayanan = isset($_POST['jenis_pelayanan']) ? htmlentities($_POST['jenis_pelayanan']) : "";
$kategori = isset($_POST['katekamr']) ? htmlentities($_POST['katekamr']) : "";
$waktu = isset($_POST['waktu']) ? htmlentities($_POST['waktu']) : "";




$message = "";  // Inisialisasi variabel $message


if (!empty($_POST['binggung_reg_validate'])) {
    $statusupload = 1;

    if ($statusupload == 1) {
        // Memperbaiki query update
        $query = mysqli_query($conn, "UPDATE tb_pendaftaran SET  status=2 WHERE id_reg='$id_reg'");
        if ($query) {
            $message = '<script>alert("Berhasil menerima pendaftaran dari pendaftar"); window.location="../pendaftar";</script>';
        } else {
            $message = '<script>alert("gagal menerima pendaftaran dari pendaftar"); window.location="../pendaftar";</script>';
        }
    }
}
echo $message;
