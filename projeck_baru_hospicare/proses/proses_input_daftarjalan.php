<?php
include "connect.php";

$nik = isset($_POST['nik']) ? htmlentities($_POST['nik']) : "";
$nama_pasien = isset($_POST['nama_pasien']) ? htmlentities($_POST['nama_pasien']) : "";
$tgl_lahir = isset($_POST['tgl_lahir']) ? htmlentities($_POST['tgl_lahir']) : "";
$jns_kelamin = isset($_POST['jns_kelamin']) ? htmlentities($_POST['jns_kelamin']) : "";
$alamat_pasien = isset($_POST['alamat_pasien']) ? htmlentities($_POST['alamat_pasien']) : "";
$nohp_pas = isset($_POST['nohp_pas']) ? htmlentities($_POST['nohp_pas']) : "";
$rencana_janjitemu = isset($_POST['rencana_janji_temu']) ? htmlentities($_POST['rencana_janji_temu']) : "";
$nama_poli = isset($_POST['id']) ? htmlentities($_POST['id']) : "";
$jenis_pelayanan = isset($_POST['jenis_pelayanan']) ? htmlentities($_POST['jenis_pelayanan']) : "";
$pengguna = isset($_POST['pengguna']) ? htmlentities($_POST['pengguna']) : "";

$message = "";  // Inisialisasi variabel $message

if (isset($_POST['input_pendaftar_validate']) && $_POST['input_pendaftar_validate'] == 1) {
    // Cek apakah NIK sudah ada
    $select = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE nik = '$nik'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Data pasien dengan NIK tersebut sudah ada"); window.location="../daftarjalan";</script>';
    } else {
        // Query untuk memasukkan data ke database
        $query = "INSERT INTO tb_pendaftaran (nik, nama_pasien, tgl_lahir, jns_kelamin, alamat_pasien, nohp_pas, rencana_janji_temu, nama_poli, jenis_pelayanan, pengguna) 
                  VALUES ('$nik', '$nama_pasien', '$tgl_lahir', '$jns_kelamin', '$alamat_pasien', '$nohp_pas', '$rencana_janjitemu', '$nama_poli','$jenis_pelayanan','$pengguna')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $message = '<script>alert("Pendaftaran berhasil dilakukan"); window.location="../daftarjalan";</script>';
        } else {
            $message = '<script>alert("Pendaftaran gagal: ' . mysqli_error($conn) . '"); window.location="../daftarjalan";</script>';
        }
    }
}

// Menutup koneksi
mysqli_close($conn);

echo $message;
