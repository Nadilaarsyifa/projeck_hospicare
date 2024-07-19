<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_pendaftaran
LEFT JOIN tb_kelaskamar ON tb_kelaskamar.kategori = tb_pendaftaran.katekamr
LEFT JOIN tbbaru ON tbbaru.kategori = tb_kelaskamar.kategori");

$result = [];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kategori = mysqli_query($conn, "SELECT * FROM tb_kelaskamar");

?>


<div class="col-lg-9 mt-2">
    <div class="card-body w-100">
        <div class="row">

            <!-- Form Pendaftaran -->
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <b> Pendaftaran Rawat Jalan </b>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_semivip.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingnik" placeholder="1112345xxxxxx" name="nik" required>
                                        <label for="floatingnik">No NIK Pasien</label>
                                        <div class="invalid-feedback">
                                            Masukkan No NIK pasien
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingalamat" placeholder="alamat Pasien" name="alamat_pasien" required>
                                        <label for="floatingalamat">Alamat</label>
                                        <div class="invalid-feedback">
                                            Masukkan Alamat Pasien
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnama" placeholder="nama Pasien" name="nama_pasien" required>
                                        <label for="floatingnama">Nama Pasien</label>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Pasien
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingtgllahir" name="nohp_pas" required>
                                        <label for="floatingtgllahir"> No HP</label>
                                        <div class="invalid-feedback">
                                            Masukkan NO HP Aktif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingtgllahir" name="tgl_lahir" required>
                                        <label for="floatingtgllahir">Tgl Lahir</label>
                                        <div class="invalid-feedback">
                                            Masukkan Tgl lahir pasien
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingpoli" placeholder="nama Pasien" name="nama_poli" required>
                                        <label for="floatingpoli">Nama Poliklinik</label>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Poliklinik
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingJenisKelamin" name="jenis_kelamin" required>
                                            <option selected hidden value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <label for="floatingJenisKelamin">Jenis Kelamin</label>
                                        <div class="invalid-feedback">
                                            Pilih Jenis Kelamin
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingtgrencana" name="rencana_janji_temu" required>
                                        <label for="floatingtgrencana">Rencana janji temu</label>
                                        <div class="invalid-feedback">
                                            Rencana janji_temu
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="floatingketeranganf" style="height: 130px" name="informasi_lebih"></textarea>
                                        <label for="floatingketerangan">Beri Tahu kami tentang keluhan Anda.</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr class="featurette-divider">
                        <em>
                            <p>Pendaftaran Anda akan dibatalkan jika anda tidak hadir pada jadwal yang telah dipersetujui. Terima kasih atas pengertiannya.</p>
                        </em>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </div>
            </div>
            <!-- End Form Pendaftaran -->
        </div>
    </div>
</div>