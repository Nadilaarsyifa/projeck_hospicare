<?php
session_start();
include "connect.php";
$username = isset($_POST['username']) ? htmlentities($_POST['username']) : "";
$password = isset($_POST['password']) ? md5(htmlentities($_POST['password'])) : "";

if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        $_SESSION['username_hospicare'] = $username;
        $_SESSION['level_hospicare'] = $hasil['level'];
        header('Location: ../beranda');
        exit(); // Menambahkan exit untuk memastikan tidak ada output yang dihasilkan setelah header
    } else {
        echo '<script>
            alert("Username atau password yang Anda masukkan salah");
            window.location.href = "../login";
        </script>';
    }
}
