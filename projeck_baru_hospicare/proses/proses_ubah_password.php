<?php
session_start();
include "connect.php";

// Mengambil nilai dari form dan menghindari SQL Injection
$id = isset($_POST['id']) ? htmlentities($_POST['id']) : "";
$passwordlama = isset($_POST['passwordlama']) ? md5(htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = isset($_POST['passwordbaru']) ? htmlentities($_POST['passwordbaru']) : "";
$repasswordbaru = isset($_POST['repasswordbaru']) ? htmlentities($_POST['repasswordbaru']) : "";

$message = "";  // Inisialisasi variabel $message

if (!empty($_POST['ubah_password_validate'])) {
    // Debugging: cek nilai sesi username
    if (!isset($_SESSION['username_hospicare'])) {
        echo "<script>alert('Sesi tidak ditemukan'); window.history.back()</script>";
        exit();
    }

    $username = $_SESSION['username_hospicare'];

    // Debugging: cek nilai variabel
    // echo "Username: $username";
    // echo "Password Lama: $passwordlama";

    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);

    if ($hasil) {
        if ($passwordbaru == $repasswordbaru) {
            $passwordbaru_hashed = md5($passwordbaru);
            $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru_hashed' WHERE username = '$username'");
            if ($query) {
                $message = "<script>alert('Password berhasil diubah'); window.history.back()</script>";
            } else {
                $message = "<script>alert('Password gagal diubah'); window.history.back()</script>";
            }
        } else {
            $message = "<script>alert('Password baru tidak sama'); window.history.back()</script>";
        }
    } else {
        $message = "<script>alert('Password lama tidak sesuai'); window.history.back()</script>";
    }
} else {
    header('location:../home');
}
echo $message;
