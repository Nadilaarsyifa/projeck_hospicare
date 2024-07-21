<?php
include 'connect.php'; 

session_start();

$nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, htmlentities($_POST['nama'])) : '';
$nohp = isset($_POST['nohp']) ? mysqli_real_escape_string($conn, htmlentities($_POST['nohp'])) : '';
$alamat = isset($_POST['alamat']) ? mysqli_real_escape_string($conn, htmlentities($_POST['alamat'])) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($conn, htmlentities($_POST['username'])) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, htmlentities($_POST['password'])) : '';


$query = "SELECT * FROM tb_user WHERE username = '$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo '<script>alert("username sudah terdaftar."); window.location="../signup.php";</script>';
    exit();
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);


$query = "INSERT INTO tb_user (nama, nohp, alamat, username, password, level) VALUES ('$nama', '$nohp', '$alamat', '$username', '$hashed_password',3)";

if (mysqli_query($conn, $query)) {

    header('Location="../login.php"');
    exit();
} else {
   
    echo '<script>alert("Gagal menyimpan data. Silakan coba lagi."); window.location="../signup.php";</script>';
}

// Tutup koneksi
mysqli_close($conn);
