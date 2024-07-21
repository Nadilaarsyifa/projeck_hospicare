<?php
include 'connect.php';

session_start();

// Mengambil data dari form
$nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, htmlentities($_POST['nama'])) : '';
$nohp = isset($_POST['nohp']) ? mysqli_real_escape_string($conn, htmlentities($_POST['nohp'])) : '';
$alamat = isset($_POST['alamat']) ? mysqli_real_escape_string($conn, htmlentities($_POST['alamat'])) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, htmlentities($_POST['username'])) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, htmlentities($_POST['password'])) : '';

// Cek apakah username sudah terdaftar
$query = "SELECT * FROM tb_user WHERE username = '$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("username sudah terdaftar."); window.location="../login.php";</script>';
    exit(); // Tambahkan exit untuk menghentikan script
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Simpan data pengguna baru ke dalam database
$query = "INSERT INTO tb_user (nama, nohp, alamat, username, password, level) VALUES ('$nama', '$nohp', '$alamat', '$username', '$hashed_password', 3)";

if (mysqli_query($conn, $query)) {
    // Redirect ke halaman login
    header('Location: ../login.php');
    exit(); // Tambahkan exit untuk memastikan script berhenti setelah redirect
} else {
    echo '<script>alert("Gagal menyimpan data. Silakan coba lagi."); window.location="../login.php";</script>';
    exit(); // Tambahkan exit untuk menghentikan script
}

// Tutup koneksi
mysqli_close($conn);
