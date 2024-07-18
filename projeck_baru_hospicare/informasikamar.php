<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kelaskamar");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>


<div class="col-lg-9 mt-2">

    <div class="container mt-5">
        <h2 class="text-center">Pilih Kategori Kamar</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/semivip.jpeg" class="card-img-top" alt="Kamar VIP">
                    <div class="card-body">
                        <h5 class="card-title">Kamar Semi VIP</h5>
                        <p class="card-text">Kamar dengan fasilitas standar.</p>
                        <a href="kamarsemivip" class="btn btn-primary" style="background-color: rgb(2, 139, 44)">Lihat Kamar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/vip.jpeg" class="card-img-top" alt="Kamar Semi VIP">
                    <div class="card-body">
                        <h5 class="card-title">Kamar VIP</h5>
                        <p class="card-text">Kamar dengan fasilitas sangat baik.</p>
                        <a href="kamarvip" class="btn btn-primary" style="background-color: rgb(2, 139, 44)">Lihat Kamar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/bangsal.jpeg" class="card-img-top" alt="Kamar Semi VIP">
                    <div class="card-body">
                        <h5 class="card-title">Kamar Bangsal</h5>
                        <p class="card-text">Kamar dengan fasilitas baik.</p>
                        <a href="bangsal" class="btn btn-primary" style="background-color: rgb(2, 139, 44)">Lihat Kamar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="featurette-divider">
    <div class="card">
        <div class="card-header">
            <h4> Tabel fasilitas kamar</h4>
        </div>
        <div class="card-body w-100">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahkelas" style="background-color: rgb(2, 139, 44)">Tambah Kelas</button>
                </div>
            </div>
            <!-- Modal  tambah kamar baru-->
            <div class="modal fade" id="modaltambahkelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kelas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_kelas.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingid" placeholder="your id" name="kategori" required>
                                            <label for="floatingid"> kategori </label>
                                            <div class="invalid-feedback">
                                                Masukkan kategori
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingjadwal" placeholder="jadwal praktik" name="fasilitas" required>
                                            <label for="floatingjadwal"> fasilitas </label>
                                            <div class="invalid-feedback">
                                                Masukkan fasilitas
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingLevel" aria-label="Default select example" name="kode" required>
                                                <option selected hidden value="">Pilih kode</option>
                                                <option value="l">l</option>
                                                <option value="ll">ll</option>
                                                <option value="lll">lll</option>
                                            </select>
                                            <label for="floatingLevel">kode kelas</label>
                                            <div class="invalid-feedback">
                                                Pilih kode kamar
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_kelas_validate" value="12345">Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--end  Modal  tambah kamar baru-->

            <?php
            if (empty($result)) {
                echo "Data kamar tidak ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">NO</th>
                                <th scope="col">kategori</th>
                                <th scope="col">fasilitas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>

                                <tr class="text-nowrap">
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $row['kategori']; ?></td>
                                    <td><?php echo $row['fasilitas']; ?></td>

                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['kategori'] ?>"><i class=" bi bi-trash"></i></button>

                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php foreach ($result as $row) { ?>

                    <!-- Modal delete-->
                    <div class="modal fade" id="modaldelete<?php echo $row['kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete Data kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_kelas.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['kategori'] ?>" name="kategori">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus kategori <b><?php echo $row['kategori'] ?> </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_kelas_validate" value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal delete-->

                <?php } ?>
            <?php } ?>



        </div>
    </div>
</div>