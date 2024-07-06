<?php
$username = isset($_POST['username']) ? htmlentities($_POST['username']) : "";
$password = isset($_POST['password']) ? htmlentities($_POST['password']) : "";

if (!empty($_POST['submit_validate'])) {
    if ($username == "nadila422@gmail.com" && $password == "password") {
        header('Location: beranda');
        exit(); // Menambahkan exit untuk memastikan tidak ada output yang dihasilkan setelah header
    } else {
        echo '<script>alert("Username atau password yang Anda masukkan salah");</script>';
    }
}
