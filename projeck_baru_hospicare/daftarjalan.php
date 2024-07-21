<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_pendaftaran
LEFT JOIN tb_poliklinik ON tb_poliklinik.id = tb_pendaftaran.nama_poli");

$result = [];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kategori = mysqli_query($conn, "SELECT * FROM tb_poliklinik");

?>


<div class="col-lg-9 mt-2" style="height: 700px;">
    <div class="card-body w-100">
        <div class="row">

            <!-- Form Pendaftaran -->
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <b> Pendaftaran Rawat Inap </b>
                    </div>
                    <div class="card-body" style="height: 700px;">
                        <form id="daftarForm" class="needs-validation" novalidate action="proses/proses_input_daftarjalan.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="input_pendaftar_validate" value="1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingnik" placeholder="1112345xxxxxx" name="pengguna" required>
                                        <label for="floatingnik">ID Username (lihat profil)</label>
                                        <div class="invalid-feedback">Masukkan Id</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingtgllahir" name="rencana_jannji_temu" required>
                                        <label for="floatingtgllahir">Tgl temu</label>
                                        <div class="invalid-feedback">Masukkan janji temu</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingnik" placeholder="1112345xxxxxx" name="nik" required>
                                        <label for="floatingnik">No NIK Pasien</label>
                                        <div class="invalid-feedback">Masukkan No NIK pasien</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingalamat" placeholder="alamat Pasien" name="alamat_pasien" required>
                                        <label for="floatingalamat">Alamat</label>
                                        <div class="invalid-feedback">Masukkan Alamat Pasien</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnama" placeholder="nama Pasien" name="nama_pasien" required>
                                        <label for="floatingnama">Nama Pasien</label>
                                        <div class="invalid-feedback">Masukkan Nama Pasien</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingtgllahir" name="nohp_pas" required>
                                        <label for="floatingtgllahir"> No HP</label>
                                        <div class="invalid-feedback">Masukkan NO HP Aktif</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingtgllahir" name="tgl_lahir" required>
                                        <label for="floatingtgllahir">Tgl Lahir</label>
                                        <div class="invalid-feedback">Masukkan Tgl lahir pasien</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingtgllahir" name="jenis_pelayanan" value="Rawat Jalan" readonly>
                                        <label for="floatingtgllahir">jenis pelayanan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingJenisKelamin" name="jns_kelamin" required>
                                            <option selected hidden value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <label for="floatingJenisKelamin">Jenis Kelamin</label>
                                        <div class="invalid-feedback">Pilih Jenis Kelamin</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="id" required>
                                            <option selected hidden value="">Pilih Poliklinik</option>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($select_kategori)) {
                                                echo '<option value="' . $row['id'] . '">' . $row['nama_poli'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingKategoriKamar">Poliklinik</label>
                                        <div class="invalid-feedback">Pilih Poliklinik</div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" id="openConfirmModal" class="btn btn-primary"> Daftar </button>

                            <hr>
                            <p style="font-size: small;"> <em> Untuk rawat Jalan pendaftaran Anda akan dibatalkan jika Anda tidak datang ke rumah sakit pada waktu yang telah disetujui. Terima kasih atas pengertiannya. </em>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Form Pendaftaran -->


    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pendaftaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin melakukan pendaftaran dengan data-data yang Anda masukkan atau cek ulang data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cek Ulang</button>
                    <button type="button" id="confirmSubmit" class="btn btn-primary">Ya, Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('daftarForm');
            const openConfirmModalBtn = document.getElementById('openConfirmModal');
            const confirmBtn = document.getElementById('confirmSubmit');
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));

            openConfirmModalBtn.addEventListener('click', function() {
                // Validasi form sebelum membuka modal
                if (form.checkValidity()) {
                    modal.show();
                } else {
                    form.reportValidity(); // Tampilkan pesan validasi
                }
            });

            confirmBtn.addEventListener('click', function() {
                form.submit(); // Submit form jika tombol konfirmasi ditekan
            });
        });
    </script>