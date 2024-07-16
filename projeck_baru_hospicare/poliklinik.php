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
                        <button class="btn btn-secondary my-1" data-bs-toggle="modal" style="background-color: rgb(2, 139, 44)" data-bs-target="#modaltambahpoliklinik">Tambah Poliklinik</button>
                    </div>
                </div>

                <!-- Modal tambah poliklinik baru -->
                <div class="modal fade" id="modaltambahpoliklinik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Poliklinik</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_poliklinik.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control py-3" id="floatingfoto" placeholder="foto" name="foto" required>
                                                <label class="input-group-text" for="floatingfoto"> Upload Foto</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Foto
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingIDPoliklinik" placeholder="ID Poliklinik" name="id_poli" required>
                                                        <label for="floatingIDPoliklinik">ID Poliklinik</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan ID Poliklinik
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingNamaPoliklinik" placeholder="Nama Poliklinik" name="nama_poli" required>
                                                        <label for="floatingNamaPoliklinik">Nama Poliklinik</label>
                                                        <div class="invalid-feedback">
                                                            Masukkan Nama Poliklinik
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="floatingKeterangan" style="height: 200px" name="keterangan" required></textarea>
                                                <label for="floatingKeterangan">Keterangan</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Keterangan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_poliklinik_validate">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal tambah poliklinik baru -->
            </section>
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php if (!empty($result)) {
                            foreach ($result as $row) { ?>
                                <div class="col-md-6">
                                    <div class="card shadow-sm">
                                        <div style="position: relative; width: 100%; height: 225px; overflow: hidden;">
                                            <img src="assets/img/<?= $row['foto'] ?>" style="width: 100%; height: auto; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="bd-placeholder-img card-img-top" alt="Gambar <?= $row['nama_poli'] ?>">
                                        </div>
                                        <div class="card-body">
                                            <p><b><?= $row['nama_poli'] ?></b></p>
                                            <b>Nomor ID : </b> <?= $row['id_poli'] ?>
                                            <p class="card-text"><?= $row['keterangan'] ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id'] ?>">Edit</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id'] ?>">Hapus</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit-->
                                <div class="modal fade" id="modaledit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Poliklinik</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_edit_poliklinik.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>"> <!-- Tambahkan input hidden untuk ID -->
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control py-3" id="floatingfoto" placeholder="foto" name="foto">
                                                                <label class="input-group-text" for="floatingfoto"> Upload Foto</label>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Foto
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control" id="floatingIDPoliklinik" placeholder="ID Poliklinik" value="<?php echo $row['id_poli'] ?>" name="id_poli" required>
                                                                        <label for="floatingIDPoliklinik">ID Poliklinik</label>
                                                                        <div class="invalid-feedback">
                                                                            Masukkan ID Poliklinik
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control" id="floatingNamaPoliklinik" placeholder="Nama Poliklinik" name="nama_poli" value="<?php echo $row['nama_poli'] ?>" required>
                                                                        <label for="floatingNamaPoliklinik">Nama Poliklinik</label>
                                                                        <div class="invalid-feedback">
                                                                            Masukkan Nama Poliklinik
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-floating mb-3">
                                                                <textarea class="form-control" id="floatingKeterangan" style="height: 200px" name="keterangan" required><?php echo $row['keterangan'] ?></textarea>
                                                                <label for="floatingKeterangan">Keterangan</label>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Keterangan
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="edit_poliklinik_validate">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Modal edit-->




                                <!-- Modal delete-->
                                <div class="modal fade" id="modaldelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete Data user</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="needs-validation" novalidate action="proses/proses_delete_poliklinik.php" method="POST">
                                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                                    <div class="col-lg-12">
                                                        Apakah anda ingin menghapus dokter <b><?php echo $row['nama_poli'] ?></b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger" name="delete_poliklinik_validate" value="12345">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end Modal delete-->


                        <?php }
                        } ?>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <p class="text-center">Tidak ada data poliklinik.</p>
            </div>


        </main>

        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</div>

<footer class="text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Kembali ke Atas</a>
        </p>
    </div>
</footer>