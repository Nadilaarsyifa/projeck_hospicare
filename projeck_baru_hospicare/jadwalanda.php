<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_pendaftaran
LEFT JOIN tb_poliklinik ON tb_poliklinik.id = tb_pendaftaran.nama_poli
LEFT JOIN tb_kelaskamar ON tb_kelaskamar.kategori = tb_pendaftaran.katekamr
LEFT JOIN tb_user ON tb_user.id = tb_pendaftaran.pengguna");

$rawat_jalan = [];
$rawat_inap = [];
while ($record = mysqli_fetch_array($query)) {
    if ($record['jenis_pelayanan'] == 'Rawat Jalan') {
        $rawat_jalan[] = $record;
    } elseif ($record['jenis_pelayanan'] == 'Rawat Inap') {
        $rawat_inap[] = $record;
    }
}
?>

<div class="col-lg-9 mt-2" style="height: 1000px;">
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Aktivitas Pendaftaran Rawat Jalan</h5>
                </div>
                <div class="card-body w-100">
                    <?php if (empty($rawat_jalan)) { ?>
                        <p>Aktivitas pendaftaran tidak ada</p>
                    <?php } else { ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Waktu Reg</th>
                                        <th scope="col">Nomor Reg</th>
                                        <th scope="col">Jenis Pelayanan</th>
                                        <th scope="col">No NIK</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Tgl Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No HP</th>
                                        <th scope="col">Poliklinik</th>
                                        <th scope="col">Janji Temu</th>
                                        <th scope="col">Informasi Untuk Pendaftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($rawat_jalan as $row) { ?>
                                        <tr class="text-nowrap">
                                            <th scope="row"><?php echo $no++; ?></th>
                                            <td>
                                                <?php if ($row['status'] == 1) { ?>
                                                    <span class='badge text-bg-success'>Aktif</span>
                                                <?php } elseif ($row['status'] == 2) { ?>
                                                    <span class='badge text-bg-danger'>Selesai</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="<?php echo (!empty($row['status'])) ? 'btn btn-secondary btn-sm me-1 disabled' : 'btn btn-primary btn-sm me-1'; ?>" onclick="showModal(<?php echo $row['id_reg']; ?>, '<?php echo $row['jenis_pelayanan']; ?>')">
                                                        proses
                                                    </button>
                                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id_reg']; ?>">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td><?php echo $row['waktu']; ?></td>
                                            <td><?php echo $row['id_reg']; ?></td>
                                            <td><?php echo $row['jenis_pelayanan']; ?></td>
                                            <td><?php echo $row['nik']; ?></td>
                                            <td><?php echo $row['nama_pasien']; ?></td>
                                            <td><?php echo $row['tgl_lahir']; ?></td>
                                            <td><?php echo $row['jns_kelamin']; ?></td>
                                            <td><?php echo $row['alamat_pasien']; ?></td>
                                            <td><?php echo $row['nohp_pas']; ?></td>
                                            <td><?php echo $row['nama_poli']; ?></td>
                                            <td><?php echo $row['rencana_janji_temu']; ?></td>
                                            <td><?php echo $row['feedback_adm']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Aktivitas Pendaftaran Rawat Inap</h5>
                </div>
                <div class="card-body w-100">
                    <?php if (empty($rawat_inap)) { ?>
                        <p>Data Pendaftar tidak ada</p>
                    <?php } else { ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th scope="col">No</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Waktu Reg</th>
                                        <th scope="col">Nomor Reg</th>
                                        <th scope="col">Jenis Pelayanan</th>
                                        <th scope="col">No NIK</th>
                                        <th scope="col">Nama Pasien</th>
                                        <th scope="col">Tgl Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No HP</th>
                                        <th scope="col">Kategori Kamar</th>
                                        <th scope="col">Informasi Untuk Pendaftar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($rawat_inap as $row) { ?>
                                        <tr class="text-nowrap">
                                            <th scope="row"><?php echo $no++; ?></th>
                                            <td>
                                                <?php if ($row['status'] == 1) { ?>
                                                    <span class='badge text-bg-success'>Aktif</span>
                                                <?php } elseif ($row['status'] == 2) { ?>
                                                    <span class='badge text-bg-danger'>Selesai</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="<?php echo (!empty($row['status'])) ? 'btn btn-secondary btn-sm me-1 disabled' : 'btn btn-primary btn-sm me-1'; ?>" onclick="showModal(<?php echo $row['id_reg']; ?>, '<?php echo $row['jenis_pelayanan']; ?>')">
                                                        Terima
                                                    </button>
                                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id_reg']; ?>">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <button class="<?php echo (empty($row['feedback_adm']) || $row['status'] != 1) ? 'btn btn-secondary btn-sm me-1 disabled' : 'btn btn-success btn-sm me-1'; ?>" data-bs-toggle="modal" data-bs-target="#nonaktif<?php echo $row['id_reg']; ?>">
                                                        Selesai
                                                    </button>
                                                </div>
                                            </td>
                                            <td><?php echo $row['waktu']; ?></td>
                                            <td><?php echo $row['id_reg']; ?></td>
                                            <td><?php echo $row['jenis_pelayanan']; ?></td>
                                            <td><?php echo $row['nik']; ?></td>
                                            <td><?php echo $row['nama_pasien']; ?></td>
                                            <td><?php echo $row['tgl_lahir']; ?></td>
                                            <td><?php echo $row['jns_kelamin']; ?></td>
                                            <td><?php echo $row['alamat_pasien']; ?></td>
                                            <td><?php echo $row['nohp_pas']; ?></td>
                                            <td><?php echo $row['katekamr']; ?></td>
                                            <td><?php echo $row['feedback_adm']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>