<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_pendaftaran
LEFT JOIN tb_poliklinik ON tb_poliklinik.id = tb_pendaftaran.nama_poli
LEFT JOIN tb_kelaskamar ON tb_kelaskamar.kategori = tb_pendaftaran.katekamr
LEFT JOIN tb_user ON tb_user.id = tb_pendaftaran.pengguna where status='2'");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}


$hari_terlewat_query = mysqli_query($conn, "SELECT 
    DATEDIFF(NOW(), waktu) AS selisih_hari
    FROM tb_pendaftaran");

$selisih_hari = 0;
if ($row = mysqli_fetch_array($hari_terlewat_query)) {
    $selisih_hari = $row['selisih_hari'];
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Pendaftar
        </div>
        <div class="card-body w-100">


            <?php
            if (empty($result)) {
                echo "Data Pendaftar tidak ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table id="example" class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">username</th>
                                <th scope="col"> status</th>
                                <th scope="col"> Waktu Reg</th>
                                <th scope="col">Nomor Reg</th>
                                <th scope="col">Jenis Pelayanan</th>
                                <th scope="col">No NIK</th>
                                <th scope="col">kategori kamar</th>
                                <th scope="col">Poliklinik</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr class="text-nowrap">
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php if ($row['status'] == 1) {
                                            echo "<span class= 'badge text-bg-success'>Aktif</span>";
                                        } elseif ($row['status'] == 2) {
                                            echo "<span class= 'badge text-bg-danger'>Selesai</span>";
                                        }
                                        ?></td>
                                    <td><?php echo $row['waktu']; ?></td>
                                    <td><?php echo $row['id_reg']; ?></td>
                                    <td><?php echo $row['jenis_pelayanan']; ?></td>
                                    <td><?php echo $row['nik']; ?></td>
                                    <td><?php echo $row['katekamr']; ?></td>
                                    <td><?php echo $row['nama_poli']; ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php foreach ($result as $row) { ?>



                    <!-- Modal Edit-->
                    <div class="modal fade" id="modalEditRawatJalan<?php echo $row['id_reg'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Data pendaftar Rawat Jalan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_reg.php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" value="<?php echo $row['id_reg'] ?>" name="id_reg">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingUsername1" placeholder="your name" name="id_reg" value="<?php echo $row['id_reg'] ?>" readonly>
                                                    <label for="floatingUsername">nomor Registrasi</label>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="tex" class="form-control" id="floatingid" placeholder="your id" name="waktu" value="<?php echo $row['waktu'] ?>" readonly>
                                                    <label for="floatingid1">Waktu Registrasi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="jenis_pelayanan" value="<?php echo $row['jenis_pelayanan'] ?>" readonly>
                                                    <label for="floatingid1">jenis pelayanan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="nama_poli" value="<?php echo $row['nama_poli'] ?>" readonly>
                                                    <label for="floatingid1">Nama poliklinik</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingid" placeholder="your id" name="nik" value="<?php echo $row['nik'] ?>" readonly>
                                                    <label for="floatingid1">No NIK</label>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="nama_pasien" value="<?php echo $row['nama_pasien'] ?>" readonly>
                                                    <label for="floatingUsername">Nama pasien</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="jns_kelamin" value="<?php echo $row['jns_kelamin'] ?>" readonly>
                                                    <label for="floatingUsername">Jenis Kelamin</label>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" id="floatingid" placeholder="your id" name="tgl_lahir" value="<?php echo $row['tgl_lahir'] ?>" readonly>
                                                    <label for="floatingid1">Tgl lahir</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="alamat_pasien" value="<?php echo $row['alamat_pasien'] ?>" readonly>
                                                    <label for="floatingid1"> Alamat </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="nohp_pas" value="<?php echo $row['nohp_pas'] ?>" readonly>
                                                    <label for="floatingUsername">No HP</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" id="floatingUsername1" placeholder="your name" name="rencana_janji_temu" value="<?php echo $row['rencana_janji_temu'] ?>" readonly>
                                                    <label for="floatingUsername">Rencana janji temu</label>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <textarea class="form-control" id="floatingketeranganf" style="height: 130px" name="feedback_adm"><?php echo $row['feedback_adm']; ?></textarea>
                                                    <label for="floatingketerangan">Informasi Untuk Anda</label>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_reg_validate" value="12345">Terima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal edit-->




                    <!-- Modal Edit-->
                    <div class="modal fade" id="modalEditRawatInap<?php echo $row['id_reg'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Data pendaftar Rawat Inap</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_reg.php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" value="<?php echo $row['id_reg'] ?>" name="id_reg">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingUsername1" placeholder="your name" name="id_reg" value="<?php echo $row['id_reg'] ?>" readonly>
                                                    <label for="floatingUsername">nomor Registrasi</label>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="tex" class="form-control" id="floatingid" placeholder="your id" name="waktu" value="<?php echo $row['waktu'] ?>" readonly>
                                                    <label for="floatingid1">Waktu Registrasi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="jenis_pelayanan" value="<?php echo $row['jenis_pelayanan'] ?>" readonly>
                                                    <label for="floatingid1">jenis pelayanan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="katekamr" value="<?php echo $row['katekamr'] ?>" readonly>
                                                    <label for="floatingid1">Kategori Kamar</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingid" placeholder="your id" name="nik" value="<?php echo $row['nik'] ?>" readonly>
                                                    <label for="floatingid1">No NIK</label>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="nama_pasien" value="<?php echo $row['nama_pasien'] ?>" readonly>
                                                    <label for="floatingUsername">Nama pasien</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="jns_kelamin" value="<?php echo $row['jns_kelamin'] ?>" readonly>
                                                    <label for="floatingUsername">Jenis Kelamin</label>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" id="floatingid" placeholder="your id" name="tgl_lahir" value="<?php echo $row['tgl_lahir'] ?>" readonly>
                                                    <label for="floatingid1">Tgl lahir</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="alamat_pasien" value="<?php echo $row['alamat_pasien'] ?>" readonly>
                                                    <label for="floatingid1"> Alamat </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingUsername1" placeholder="your name" name="nohp_pas" value="<?php echo $row['nohp_pas'] ?>" readonly>
                                                    <label for="floatingUsername">No HP</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <textarea class="form-control" id="floatingketeranganf" style="height: 130px" name="feedback_adm"><?php echo $row['feedback_adm']; ?></textarea>
                                                    <label for="floatingketerangan">Informasi Untuk Anda</label>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_reg_validate" value="12345">Terima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Modal edit-->



                    <!-- Modal Edit selesai -->
                    <div class="modal fade" id="nonaktif<?php echo $row['id_reg'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Registrasi selesai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_selesai_reg .php" method="POST" enctype="multipart/form-data">

                                        <input type="hidden" value="<?php echo $row['id_reg'] ?>" name="id_reg">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingUsername1" placeholder="your name" name="id_reg" value="<?php echo $row['id_reg'] ?>" readonly>
                                                    <label for="floatingUsername">nomor Registrasi</label>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="waktu" value="<?php echo $row['waktu']; ?>" readonly>
                                                    <label for="floatingid1">Waktu Registrasi</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingid" placeholder="your id" name="jenis_pelayanan" value="<?php echo $row['jenis_pelayanan'] ?>" readonly>
                                                    <label for="floatingid1">jenis pelayanan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingdays" placeholder="days passed" value="Tercatat sudah <?php echo $selisih_hari ?> hari setelah registrasi diterima" readonly>
                                                    <label for="floatingdays"> jumlah hari </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" style="background-color: rgb(2, 139, 44)" name="selesai_reg_validate" value="12345">Selesaikan </button>
                                        </div>
                                    </form>
                                </div>
                            </div>





                        </div>
                    </div>
        </div>
    </div>
    <!-- end Modal edit-->


    <!-- Modal delete-->
    <div class="modal fade" id="modaldelete<?php echo $row['id_reg'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Delete Data user</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="proses/proses_delete_reg.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id_reg'] ?>" name="id_reg">
                        <div class="col-lg-12">
                            Apakah anda ingin menghapus Registrasi nomor <b><?php echo $row['id_reg'] ?></b>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="delete_reg_validate" value="12345">Hapus</button>
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

<script>
    function showModal(id, jenis_pelayanan) {
        var modalId;

        if (jenis_pelayanan === 'Rawat Inap') {
            modalId = '#modalEditRawatInap' + id;
        } else if (jenis_pelayanan === 'Rawat Jalan') {
            modalId = '#modalEditRawatJalan' + id;
        }

        var modalElement = document.querySelector(modalId);
        var modal = new bootstrap.Modal(modalElement);
        modal.show();
    }
</script>