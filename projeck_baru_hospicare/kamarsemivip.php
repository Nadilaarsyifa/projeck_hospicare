<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tbbaru
LEFT JOIN tb_kelaskamar ON tb_kelaskamar.kategori = tbbaru.kategori where kode='ll'");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kategori = mysqli_query($conn, "SELECT kategori from tb_kelaskamar where kode='ll'");
?>



<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            <h4> Kamar Semi VIP</h4>
        </div>
        <div class="card-body w-100">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahkamar" style="background-color: rgb(2, 139, 44)">Tambah Kamar</button>
                </div>
            </div>
            <!-- Modal  tambah kamar baru-->
            <div class="modal fade" id="modaltambahkamar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kamar semi VIP</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_semivip.php" method="POST" enctype="multipart/form-data">


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="floatingfoto" placeholder="foto" name="foto" required>
                                            <label class="input-group-text" for="floatingfoto"> Upload Foto</label>
                                            <div class="invalid-feedback">
                                                Masukkan Foto
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingid" placeholder="your id" name="no_kamar" required>
                                            <label for="floatingid"> No kamar</label>
                                            <div class="invalid-feedback">
                                                Masukkan NO kamar
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingjadwal" placeholder="jadwal praktik" name="status_kamar" required>
                                            <label for="floatingjadwal"> Status</label>
                                            <div class="invalid-feedback">
                                                Masukkan Status kamar (Terbaru)
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingUsername" placeholder="your name" name="nama_kamar" required>
                                            <label for="floatingUsername"> Nama kamar</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Kamar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingspesialis" placeholder="dokter spesialis" name="terisi" required>
                                            <label for="floatingspesialis"> Terisi </label>
                                            <div class="invalid-feedback">
                                                Masukkan Terisi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingkapasitas" placeholder="your name" name="kapasitas" required>
                                            <label for="floatingkapasitas"> kapasitas </label>
                                            <div class="invalid-feedback">
                                                Masukkan Kapasitas kamar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kategori" required>
                                                <option selected hidden value="">Pilih kategori kamar</option>
                                                <?php
                                                foreach ($select_kategori as $value) {
                                                    echo '<option value="' . $value['kategori'] . '">' . $value['kategori'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingjeniskelamin">kategori kamar</label>
                                            <div class="invalid-feedback">
                                                Pilih kategori kamar
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_kamar_validate" value="12345">Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--end  Modal  tambah dokter baru-->

            <?php
            if (empty($result)) {
                echo "Data kamar tidak ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">NO</th>
                                <th scope="col">Gambar kamar</th>
                                <th scope="col">No kamar</th>
                                <th scope="col">Nama kamar</th>
                                <th scope="col">Kategori Semi VIP</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Terisi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Fasilitas</th>
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
                                    <td><img src="assets/img/<?php echo $row['foto']; ?>" style="width: 200px; height: 170px;" alt="..."></td>
                                    <td><?php echo $row['no_kamar']; ?></td>
                                    <td><?php echo $row['nama_kamar']; ?></td>
                                    <td><?php echo $row['kategori']; ?></td>
                                    <td><?php echo $row['kapasitas']; ?></td>
                                    <td><?php echo $row['terisi']; ?></td>
                                    <td><?php echo $row['status_kamar']; ?></td>
                                    <td><?php echo $row['fasilitas']; ?></td>

                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modalview<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id'] ?>"><i class="bi bi-pen"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id'] ?>"><i class=" bi bi-trash"></i></button>

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

                    <!-- Modal view-->
                    <div class="modal fade" id="modalview<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Data Kamar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_semivip.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="input-group mb-3">
                                                    <img src="assets/img/<?php echo $row['foto']; ?>" style="width: 440px; height: 280px;" alt="..." loading="lazy">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingid" placeholder="your id" name="no_kamar" value="<?php echo $row['no_kamar']; ?>">
                                                    <label for="floatingid"> No kamar</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingUsername" placeholder="your name" name="nama_kamar" value="<?php echo $row['nama_kamar']; ?>">
                                                            <label for="floatingUsername"> Nama kamar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingkapasitas" placeholder="your name" name="kapasitas" value="<?php echo $row['kapasitas']; ?>">
                                                            <label for="floatingkapasitas"> kapasitas </label>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingspesialis" placeholder="dokter spesialis" name="terisi" value="<?php echo $row['terisi']; ?>">
                                                            <label for="floatingspesialis"> Terisi </label>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="form-floating">
                                                    <textarea disabled class="form-control" id="floatingketeranganf" style="height: 130px" name="fasilitas"><?php echo $row['fasilitas']; ?></textarea>
                                                    <label for="floatingketerangan">Fasilitas</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingjadwal" placeholder="jadwal praktik" name="status_kamar" value="<?php echo $row['status_kamar']; ?>">
                                                    <label for="floatingjadwal"> Status</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingkategori" placeholder="your name" name="kategori" value="<?php echo $row['kategori']; ?>">
                                                            <label for="floatingkategori"> Kategori Bansal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- end Modal view-->




        <!-- Modal Edit-->
        <div class="modal fade" id="modaledit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Data user</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_edit_semivip.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">


                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="input-group mb-3">
                                        <img src="assets/img/<?php echo $row['foto']; ?>" style="width: 440px; height: 280px;" alt="..." loading="lazy">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input disabled type="number" class="form-control" id="floatingid" placeholder="your id" name="no_kamar" value="<?php echo $row['no_kamar']; ?>">
                                        <label for="floatingid"> No kamar</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingUsername" placeholder="your name" name="nama_kamar" value="<?php echo $row['nama_kamar']; ?>">
                                                <label for="floatingUsername"> Nama kamar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingkapasitas" placeholder="your name" name="kapasitas" value="<?php echo $row['kapasitas']; ?>">
                                                <label for="floatingkapasitas"> kapasitas </label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingspesialis" placeholder="dokter spesialis" name="terisi" value="<?php echo $row['terisi']; ?>">
                                                <label for="floatingspesialis"> Terisi </label>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-floating">
                                        <textarea disabled class="form-control" id="floatingketeranganf" style="height: 130px" name="fasilitas"><?php echo $row['fasilitas']; ?></textarea>
                                        <label for="floatingketerangan">Fasilitas</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingjadwal" placeholder="jadwal praktik" name="status_kamar" value="<?php echo $row['status_kamar']; ?>">
                                        <label for="floatingjadwal"> Status</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingkategori" placeholder="your name" name="kategori" value="<?php echo $row['kategori']; ?>">
                                                <label for="floatingkategori"> Kategori Bansal</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="edit_semivip_validate" value="12345">Save changes</button>
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
                    <form class="needs-validation" novalidate action="proses/proses_delete_semivip.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                        <div class="col-lg-12">
                            Apakah anda ingin menghapus kamar No <b><?php echo $row['no_kamar'] ?> </b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="delete_semivip_validate" value="12345">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal delete-->



<?php } ?>
<?php } ?>