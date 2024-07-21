<?php
include 'connect.php'; // Pastikan file ini berisi koneksi ke database

session_start();

// Ambil data dari form
$nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, htmlentities($_POST['nama'])) : '';
$nohp = isset($_POST['nohp']) ? mysqli_real_escape_string($conn, htmlentities($_POST['nohp'])) : '';
$alamat = isset($_POST['alamat']) ? mysqli_real_escape_string($conn, htmlentities($_POST['alamat'])) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, htmlentities($_POST['username'])) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, htmlentities($_POST['password'])) : '';

// Cek apakah username sudah terdaftar
$query = "SELECT * FROM tb_user WHERE username = '$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("username sudah terdaftar."); window.location="../signup.php";</script>';
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Query untuk menyimpan data ke tabel tb_user
$query = "INSERT INTO tb_user (nama, nohp, alamat, username, password, level) VALUES ('$nama', '$nohp', '$alamat', '$username', '$hashed_password',3)";

if (mysqli_query($conn, $query)) {
    // Redirect ke halaman login jika sukses
    header('Location="../login.php"');
    exit();
} else {
    // Jika gagal, tampilkan pesan error
    echo '<script>alert("Gagal menyimpan data. Silakan coba lagi."); window.location="../signup.php";</script>';
}

// Tutup koneksi
mysqli_close($conn);
