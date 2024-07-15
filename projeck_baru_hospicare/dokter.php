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
                    <table class="table table-hover">
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
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalresetpassword<?php echo $row['id'] ?>"><i class=" bi bi-key"></i></button>
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Detail Data user</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingNama" placeholder="your name" name="nama" value="<?php echo $row['nama']; ?>">
                                                    <label for="floatingNama">Nama</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan nama
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="email" class="form-control" id="floatingUsername" placeholder="name@example.com" name="username" value="<?php echo $row['username']; ?>">
                                                    <label for="floatingUsername">Username</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan username
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example" required name="level" id="">
                                                        <?php
                                                        $data = array("Admin", "ADM RS", "Pasien");
                                                        foreach ($data as $key => $value) {
                                                            if ($row['level'] == $key + 1) {
                                                                echo "<option selected value='$key'>$value</option>";
                                                            } else {
                                                                echo "<option  value='$key'>$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingLevel">Level user</label>
                                                    <div class="invalid-feedback">
                                                        Pilih level user
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingHP" placeholder="08xxxxxx" name="nohp" value="<?php echo $row['nohp']; ?>">
                                                    <label for="floatingHP">NO HP</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <textarea disabled class="form-control" id="floatingAlamat" style="height: 100px" name="alamat"><?php echo $row['alamat']; ?></textarea>
                                            <label for="floatingAlamat">Alamat</label>
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
                                    <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingNama" placeholder="your name" name="nama" required value="<?php echo $row['nama']; ?>">
                                                    <label for="floatingNama">Nama</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan nama
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input <?php echo ($row['username'] == $_SESSION['username_hospicare']) ? 'disabled' : ''; ?> type="email" class="form-control" id="floatingUsername" placeholder="name@example.com" name="username" required value="<?php echo $row['username']; ?>">
                                                    <label for="floatingUsername">Username</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan username
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example" required name="level" id="">
                                                        <?php
                                                        $data = array("Admin", "ADM RS", "Pasien");
                                                        foreach ($data as $key => $value) {
                                                            if ($row['level'] == $key + 1) {
                                                                echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                            } else {
                                                                echo "<option  value=" . ($key + 1) . ">$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingLevel">Level user</label>
                                                    <div class="invalid-feedback">
                                                        Pilih level user
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingHP" placeholder="08xxxxxx" name="nohp" value="<?php echo $row['nohp']; ?>">
                                                    <label for="floatingHP">NO HP</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" id="floatingAlamat" style="height: 100px" name="alamat"><?php echo $row['alamat']; ?></textarea>
                                            <label for="floatingAlamat">Alamat</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_user_validate" value="12345">Save changes</button>
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
                                    <form class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="col-lg-12">
                                            <?php if ($row['username'] == $_SESSION['username_hospicare']) {
                                                echo "<div class='alert alert-danger'> Anda tidak dapat menghapus akun sendiri </div>";
                                            } else {
                                                echo "Apakah anda yakin ingin menghapus user <b> $row[username]</b>";
                                            }
                                            ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_hospicare']) ? 'disabled' : ''; ?>>Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal delete-->




                    <!-- Modal reset password-->
                    <div class="modal fade" id="modalresetpassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Reset password</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="col-lg-12">
                                            <?php if ($row['username'] == $_SESSION['username_hospicare']) {
                                                echo "<div class='alert alert-danger'> Anda tidak dapat Mereset password sendiri </div>";
                                            } else {
                                                echo "Apakah anda yakin ingin mereset password user <b> $row[username]</b> menjadi password bawaan sistem yaitu <b>password</b>";
                                            }
                                            ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="input_user_validate" value="12345" <?php echo ($row['username'] == $_SESSION['username_hospicare']) ? 'disabled' : ''; ?>>Reset password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal reset password-->





                <?php } ?>
            <?php } ?>