<?php
include "proses/connect.php"; // Pastikan file ini berisi koneksi ke database
$query = mysqli_query($conn, "SELECT * FROM tb_poliklinik");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hospicare - Klinik</title>
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            .b-example-divider {
                width: 100%;
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            .nav-scroller {
                position: relative;
                z-index: 2;
                height: 2.75rem;
                overflow-y: hidden;
            }

            .nav-scroller .nav {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 1rem;
                margin-top: -1px;
                overflow-x: auto;
                text-align: center;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
                --bd-violet-bg: #712cf9;
                --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                --bs-btn-font-weight: 600;
                --bs-btn-color: var(--bs-white);
                --bs-btn-bg: var(--bd-violet-bg);
                --bs-btn-border-color: var(--bd-violet-bg);
                --bs-btn-hover-color: var(--bs-white);
                --bs-btn-hover-bg: #6528e0;
                --bs-btn-hover-border-color: #6528e0;
                --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                --bs-btn-active-color: var(--bs-btn-hover-color);
                --bs-btn-active-bg: #5a23c8;
                --bs-btn-active-border-color: #5a23c8;
            }

            .bd-mode-toggle {
                z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
                display: block !important;
            }
        </style>
    </head>

    <body>
        <main>

            <section class="py-0 text-right container">
                <div class="row py-0">
                    <div class="col-lg-5 col-md-1 ms-auto">
                        <p class="text-end">
                            <a href="#" class="btn btn-secondary my-1" style="background-color: rgb(2, 139, 44)">Tambah Poliklinik</a>
                        </p>
                    </div>
                </div>
            </section>



            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php if (!empty($result)) {
                            foreach ($result as $poli) { ?>
                                <div class="col-md-6">
                                    <div class="card shadow-sm">
                                        <div style="position: relative; width: 100%; height: 225px; overflow: hidden;">
                                            <img src="assets/img/<?= $poli['foto'] ?>" style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="bd-placeholder-img card-img-top" alt="Gambar <?= $poli['nama_poli'] ?>">
                                        </div>
                                        <div class="card-body">
                                            <b><?= $poli['nama_poli'] ?></b>
                                            <p class="card-text"><?= $poli['keterangan'] ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                <button type="button" class="btn btn-sm btn-outline-success">Edit</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="col-12">
                                <p class="text-center">Tidak ada data poliklinik.</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>




        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</div>


<footer class="text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Kembali ke Atas </a>
        </p>

    </div>
</footer>