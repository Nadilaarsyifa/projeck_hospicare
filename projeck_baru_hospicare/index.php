<?php
session_start();

if (isset($_GET['x']) && $_GET['x'] == 'beranda') {
    $page = "beranda.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'informasikamar') {
    $page = "informasikamar.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'poliklinik') {
    $page = "poliklinik.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'dokter') {
    $page = "dokter.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pendaftar') {
    $page = "pendaftar.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'pendaftaran') {
    $page = "pendaftaran.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'daftarinap') {
    $page = "daftarinap.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'daftarjalan') {
    $page = "daftarjalan.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kamarvip') {
    $page = "kamarvip.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'jadwalanda') {
    $page = "jadwalanda.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kamarsemivip') {
    $page = "kamarsemivip.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'singin') {
    include "singin.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION['level_hospicare'] == 1) {
        $page = "user.php";
        include "main.php";
    } else {
        $page = "beranda.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'informasirs') {
    $page = "informasirs.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'bangsal') {
    if ($_SESSION['level_hospicare'] == 1) {
        $page = "bangsal.php";
        include "main.php";
    } else {
        $page = "beranda.php";
        include "main.php";
    }
} else {
    $page = "beranda.php";
    include "main.php";
}
