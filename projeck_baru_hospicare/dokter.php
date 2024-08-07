<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_dokter");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Dokter
        </div>
        <div class="card-body w-100">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahuser" style="background-color: rgb(2, 139, 44)">Tambah Dokter</button>
                </div>
            </div>
            <!-- Modal  tambah dokter baru-->
            <div class="modal fade" id="modaltambahuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_dokter.php" method="POST" enctype="multipart/form-data">


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
                                            <input type="number" class="form-control" id="floatingid" placeholder="your id" name="Id_dokter" required>
                                            <label for="floatingid"> ID Dokter</label>
                                            <div class="invalid-feedback">
                                                Masukkan Id Dokter
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingUsername" placeholder="your name" name="nama_dokter" required>
                                            <label for="floatingUsername"> Nama Dokter</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama Dokter
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingjeniskelamin" aria-label="Default select example" name="jenis_kelamin" required>
                                                <option selected hidden value="">Pilih Jenis kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                            <label for="floatingjeniskelamin">Jenis kelamin</label>
                                            <div class="invalid-feedback">
                                                Pilih Jenis kelamin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingspesialis" placeholder="dokter spesialis" name="spesialis" required>
                                            <label for="floatingspesialis"> Spesialis </label>
                                            <div class="invalid-feedback">
                                                Masukkan Spesialis
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingjadwal" placeholder="jadwal praktik" name="jadwal_praktik" required>
                                            <label for="floatingjadwal"> Jadwal Praktik Dokter</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jadwal Praktik dokter
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingnohp" placeholder="o8xxxxxxxx" name="nohp" required>
                                            <label for="floatingnohp"> No HandPhone</label>
                                            <div class="invalid-feedback">
                                                Masukkan NO HP
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="floatingpendidikan" style="height: 100px" name="pendidikan" required></textarea>
                                            <label for="floatingpendidikan"> pendidikan </label>
                                            <div class="invalid-feedback">
                                                Masukkan Pendidikan
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="floatingketerangan" style="height: 100px" name="keterangan" required></textarea>
                                            <label for="floatingAlamat"> Keterangan </label>
                                            <div class="invalid-feedback">
                                                Masukkan keterangan
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_dokter_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--end  Modal  tambah dokter baru-->

            <?php
            if (empty($result)) {
                echo "Data User tidak ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Id_ dokter</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Spesialis</th>
                                <th scope="col">Jadwal Praktik</th>
                                <th scope="col">pendidikan</th>
                                <th scope="col">No HP</th>
                                <th scope="col">keterangan</th>
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
                                    <td><img src="assets/img/<?php echo $row['foto']; ?>" style="width: 150px; height: 120px;" alt="..."></td>
                                    <td><?php echo $row['Id_dokter']; ?></td>
                                    <td><?php echo $row['nama_dokter']; ?></td>
                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                    <td><?php echo $row['spesialis']; ?></td>
                                    <td><?php echo $row['jadwal_praktik']; ?></td>
                                    <td><?php echo $row['pendidikan']; ?></td>
                                    <td><?php echo $row['nohp']; ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Data Dokter</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_dokter.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="input-group mb-3">
                                                    <img src="assets/img/<?php echo $row['foto']; ?>" style="width: 350px; height: 270px;" alt="..." loading="lazy">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingid" placeholder="your id" name="Id_dokter" value="<?php echo $row['Id_dokter']; ?>">
                                                    <label for="floatingid1">ID Dokter</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Id Dokter
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="nama_dokter" value="<?php echo $row['nama_dokter']; ?>">
                                                            <label for="floatingUsername">Nama Dokter</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Nama Dokter
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <select disabled class="form-select" id="floatingjeniskelamin1" aria-label="Default select example" name="jenis_kelamin">
                                                                <option selected hidden value="">Pilih Jenis kelamin</option>
                                                                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                                                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                                            </select>
                                                            <label for="floatingjeniskelamin">Jenis Kelamin</label>
                                                            <div class="invalid-feedback">
                                                                Pilih Jenis Kelamin
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input disabled type="text" class="form-control" id="floatingspesialis1" placeholder="dokter spesialis" name="spesialis" value="<?php echo $row['spesialis']; ?>">
                                                            <label for="floatingspesialis">Spesialis</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Spesialis
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingjadwalw" placeholder="jadwal praktik" name="jadwal_praktik" value="<?php echo $row['jadwal_praktik']; ?>">
                                                    <label for="floatingjadwal">Jadwal Praktik Dokter</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jadwal Praktik Dokter
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingnohpd" placeholder="08xxxxxxxx" name="nohp" value="<?php echo $row['nohp']; ?>">
                                                    <label for="floatingnohp">No HandPhone</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan No HP
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <textarea disabled class="form-control" id="floatingpendidikanv" style="height: 100px" name="pendidikan"><?php echo $row['pendidikan']; ?></textarea>
                                                    <label for="floatingpendidikan">Pendidikan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Pendidikan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <textarea disabled class="form-control" id="floatingketeranganf" style="height: 100px" name="keterangan"><?php echo $row['keterangan']; ?></textarea>
                                                    <label for="floatingketerangan">Keterangan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Keterangan
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
                                    <form class="needs-validation" novalidate action="proses/proses_edit_dokter.php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control py-3" id="floatingfoto" placeholder="foto" name="foto" value="<?php echo $row['foto'] ?>">
                                                    <label class="input-group-text" for="floatingfoto"> Upload Foto</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Foto
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingid" placeholder="your id" name="Id_dokter" value="<?php echo $row['Id_dokter'] ?>">
                                                    <label for="floatingid1">ID Dokter</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Id Dokter
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="nama_dokter" value="<?php echo $row['nama_dokter'] ?>">
                                                            <label for="floatingUsername">Nama Dokter</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Nama Dokter
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" id="floatingjeniskelamin1" aria-label="Default select example" name="jenis_kelamin">
                                                                <option selected hidden value="">Pilih Jenis kelamin</option>
                                                                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                                                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                                            </select>
                                                            <label for="floatingjeniskelamin">Jenis Kelamin</label>
                                                            <div class="invalid-feedback">
                                                                Pilih Jenis Kelamin
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingspesialis1" placeholder="dokter spesialis" name="spesialis" value="<?php echo $row['spesialis'] ?>">
                                                            <label for="floatingspesialis">Spesialis</label>
                                                            <div class="invalid-feedback">
                                                                Masukkan Spesialis
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingjadwalw" placeholder="jadwal praktik" name="jadwal_praktik" value="<?php echo $row['jadwal_praktik'] ?>">
                                                    <label for="floatingjadwal">Jadwal Praktik Dokter</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jadwal Praktik Dokter
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingnohpd" placeholder="08xxxxxxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                    <label for="floatingnohp">No HandPhone</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan No HP
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="floatingpendidikanv" style="height: 100px" name="pendidikan"><?php echo $row['pendidikan'] ?></textarea>
                                                    <label for="floatingpendidikan">Pendidikan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Pendidikan
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <textarea class="form-control" id="floatingketeranganf" style="height: 100px" name="keterangan"><?php echo $row['keterangan'] ?></textarea>
                                                    <label for="floatingketerangan">Keterangan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Keterangan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_dokter_validate" value="12345">Save changes</button>
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
                                    <form class="needs-validation" novalidate action="proses/proses_delete_dokter.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus dokter <b><?php echo $row['nama_dokter'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_dokter_validate" value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal delete-->


        </div>

    <?php } ?>
<?php } ?>

    </div>
</div>


<script>
    $(document).ready(function() {
        $('#example').DataTable();


    });
</script>