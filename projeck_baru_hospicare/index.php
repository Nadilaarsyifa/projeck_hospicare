
                <?php
                if (isset($_GET['x']) && $_GET['x'] == 'beranda') {
                    $page = "beranda.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'informasikamar') {
                    $page = "informasikamar.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'pendaftar') {
                    $page = "pendaftar.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'poliklinik') {
                    $page = "poliklinik.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'pendaftaran') {
                    $page = "pendaftaran.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'berita') {
                    $page = "berita.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'kontak') {
                    $page = "kontak.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'feedback') {
                    $page = "feedback.php";
                    include "main.php";
                } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
                    include "login.php";
                } else {
                    include "main.php";
                }
                ?>
