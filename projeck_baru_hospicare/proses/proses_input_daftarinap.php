
<?php
include "connect.php";

$nik = isset($_POST['nik']) ? htmlentities($_POST['nik']) : "";
$nama_pasien = isset($_POST['nama_pasien']) ? htmlentities($_POST['nama_pasien']) : "";
$tgl_lahir = isset($_POST['tgl_lahir']) ? htmlentities($_POST['tgl_lahir']) : "";
$jns_kelamin = isset($_POST['jns_kelamin']) ? htmlentities($_POST['jns_kelamin']) : "";
$alamat_pasien = isset($_POST['alamat_pasien']) ? htmlentities($_POST['alamat_pasien']) : "";
$nohp_pas = isset($_POST['nohp_pas']) ? htmlentities($_POST['nohp_pas']) : "";
$jenis_pelayanan = isset($_POST['jenis_pelayanan']) ? htmlentities($_POST['jenis_pelayanan']) : "";
$kategori = isset($_POST['katekamr']) ? htmlentities($_POST['katekamr']) : "";
$pengguna = isset($_POST['pengguna']) ? htmlentities($_POST['pengguna']) : "";

$message = "";  // Inisialisasi variabel $message

if (isset($_POST['input_pendaftar_validate']) && $_POST['input_pendaftar_validate'] == 1) {
    // Cek apakah NIK sudah ada
    $select = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE nik = '$nik'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Data pasien dengan NIK tersebut sudah ada"); window.location="../daftarinap";</script>';
    } else {
        // Query untuk memasukkan data ke database
        $query = "INSERT INTO tb_pendaftaran (nik, nama_pasien, tgl_lahir, jns_kelamin, alamat_pasien, nohp_pas, jenis_pelayanan,katekamr, pengguna) 
                  VALUES ('$nik', '$nama_pasien', '$tgl_lahir', '$jns_kelamin', '$alamat_pasien', '$nohp_pas', '$jenis_pelayanan','$kategori','$pengguna')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $message = '<script>alert("pendaftaran berhasil dilakukan"); window.location="../daftarinap";</script>';
        } else {
            $message = '<script>alert("pendaftaran gagal: ' . mysqli_error($conn) . '"); window.location="../daftarinap";</script>';
        }
    }
}

// Menutup koneksi
mysqli_close($conn);

echo $message;
