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
            Halaman user
        </div>
        <div class="card-body w-100">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltambahuser" style="background-color: rgb(2, 139, 44)">Tambah User</button>
                </div>
            </div>
            <!-- Modal  tambah user baru-->
            <div class="modal fade" id="modaltambahuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah user</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingNama" placeholder="your name" name="nama" required>
                                            <label for="floatingNama">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukkan nama
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingUsername" placeholder="name@example.com" name="username" required>
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
                                            <select class="form-select" id="floatingLevel" aria-label="Default select example" name="level" required>
                                                <option selected hidden value="">Pilih level user</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Adm RS</option>
                                                <option value="3">Pasien</option>
                                            </select>
                                            <label for="floatingLevel">Level user</label>
                                            <div class="invalid-feedback">
                                                Pilih level user
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingHP" placeholder="08xxxxxx" name="nohp">
                                            <label for="floatingHP">NO HP</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingPassword" placeholder="your password" disabled value="1234567" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingAlamat" style="height: 100px" name="alamat"></textarea>
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

            <!--end  Modal  tambah user baru-->

            <?php
            if (empty($result)) {
                echo "Data User tidak ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama_dokter</th>
                                <th scope="col">Jenis_kelamin</th>
                                <th scope="col">Spesialis</th>
                                <th scope="col">Jadwal_Praktik</th>
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
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['foto'] ?></td>
                                    <td><?php echo $row['nama_dokter'] ?></td>
                                    <td><?php echo $row['jenis_kelamin'] ?></td>
                                    <td><?php echo $row['spesialis'] ?></td>
                                    <td><?php echo $row['jadwal_praktik'] ?></td>
                                    <td><?php echo $row['pendidikan'] ?></td>
                                    <td><?php echo $row['nohp'] ?></td>
                                    <td><?php echo $row['keterangan'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modalview<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id'] ?>"><i class="bi bi-pen"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id'] ?>"><i class=" bi bi-trash"></i></button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalresetpassword<?php echo $row['id'] ?>"><i class=" bi bi-key"></i></button>
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