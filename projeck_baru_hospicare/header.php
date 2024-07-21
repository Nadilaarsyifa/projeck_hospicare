<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$_SESSION[username_hospicare]'");
$record = mysqli_fetch_array($query);

?>

<nav class="navbar navbar-expand navbar-dark  sticky-top " style="background-color: rgb(2, 139, 44)">
    <div class="container-lg">
        <a class="navbar-brand d-flex align-items-center" href=".">
            <img class="me-2" src="logo6.png" alt="" width="50" height="50">
            <span class=" display-7">HospiCare</span>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0"></ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                        echo $hasil['username'];
                        ?>
                    </a>
                    <ul class="dropdown-menu mt-4">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalubahprofil"> <i class="bi bi-person"></i> profil</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalubahpassword"> <i class="bi bi-key"></i> Ubah Password</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal ubah password-->
<div class="modal fade" id="modalubahpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Ubah Password </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="email" class="form-control" id="floatingUsername" placeholder="name@example.com" name="username" required value="<?php echo $_SESSION['username_hospicare'] ?>">
                                <label for="floatingUsername">Username</label>
                                <div class="invalid-feedback">
                                    Masukkan username
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingpasswordlama" name="passwordlama" required>
                                <label for="floatingpasswordlama">Password lama</label>
                                <div class="invalid-feedback">
                                    Masukkan Password lama
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingpasswordbaru" name="passwordbaru" required>
                                <label for="floatingpasswordbaru">Password baru</label>
                                <div class="invalid-feedback">
                                    Masukkan Password baru
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingrepasswordbaru" name="repasswordbaru" required>
                                <label for="floatingrepasswordbaru">Ulangi password baru</label>
                                <div class="invalid-feedback">
                                    Ulangi password baru
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="ubah_password_validate" value="12345">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Ubah password-->



<!-- Modal ubah profil-->
<div class="modal fade" id="modalubahprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Ubah Profil </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_profil.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="email" class="form-control" id="floatingUsername" placeholder="name@example.com" name="username" required value="<?php echo $_SESSION['username_hospicare'] ?>">
                                <label for="floatingUsername">Username</label>
                                <div class="invalid-feedback">
                                    Masukkan username
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingnama" name="nama" required value="<?php echo $record['id'] ?>">
                                <label for="floatingnama">Id Username</label>
                                <div class="invalid-feedback">
                                    Masukkan Id username
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingnama" name="nama" required value="<?php echo $record['nama'] ?>">
                                <label for="floatingnama">Nama</label>
                                <div class="invalid-feedback">
                                    Masukkan Nama
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating">
                                <textarea class="form-control" id="floatingAlamat" style="height: 100px" name="alamat"><?php echo $record['alamat'] ?></textarea>
                                <label for="floatingAlamat">Alamat</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingnohp" name="nohp" placeholder="08xxxxxxxx" required value="<?php echo $record['nohp'] ?>">
                                <label for="floatingnohp">No HP</label>
                                <div class="invalid-feedback">
                                    Masukkan No HP
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="ubah_password_validate" value="12345">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Ubah password-->