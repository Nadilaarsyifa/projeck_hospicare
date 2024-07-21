<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 300px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <?php if ($hasil['level'] == 1 ||$hasil['level'] == 2 $hasil['level'] == 3) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'beranda') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" aria-current="page" href="beranda"><i class="bi bi-house-door"></i> Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'informasikamar') ? 'active link-light' : 'link-dark'; ?>" href="informasikamar"><i class="bi bi-door-open"></i> Daftar Kamar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'poliklinik') ? 'active link-light' : 'link-dark'; ?>" href="poliklinik"><i class="bi bi-lungs"></i> Daftar Poliklinik</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'dokter') ? 'active link-light' : 'link-dark'; ?>" href="dokter"><i class="bi bi-person-badge"></i> Daftar Dokter </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pendaftaran') ? 'active link-light' : 'link-dark'; ?>" href="pendaftaran"><i class="bi bi-journal-text"></i> Pendaftaran Online</a>
                            </li>
                            
                            <?php if ($hasil['level'] == 1 ||$hasil['level'] == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pendaftar') ? 'active link-light' : 'link-dark'; ?>" href="pendaftar"><i class="bi bi-people"></i> Pendaftar</a>
                            </li>
                            <?php } ?>
                        <?php } ?>
                        <?php if ($hasil['level'] == 1 ||$hasil['level'] == 3) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'jadwalanda') ? 'active link-light' : 'link-dark'; ?>" href="jadwalanda"><i class="bi bi-people"></i> Aktivitas </a>
                        </li>
                        <?php } ?>
                        <?php if ($hasil['level'] == 1 ||$hasil['level'] == 2 $hasil['level'] == 3) { ?>
                            <li class="nav-item">
                                <a <?php echo (isset($_GET['x']) && $_GET['x'] == 'kamarvip'); ?> href="kamarvip"></a>
                            </li>

                            <li class="nav-item">
                                <a <?php echo (isset($_GET['x']) && $_GET['x'] == 'kamarsemivip'); ?> href="kamarsemivip"></a>
                            </li>
                            <li class="nav-item">
                                <a <?php echo (isset($_GET['x']) && $_GET['x'] == 'daftarinap'); ?> href="daftarinap"></a>
                            </li>
                            <li class="nav-item">
                                <a <?php echo (isset($_GET['x']) && $_GET['x'] == 'daftarjalan'); ?> href="daftarjalan"></a>
                            </li>
                            <?php } ?>
                            <?php if ($hasil['level'] == 1 ||$hasil['level'] == 2 $hasil['level'] == 3) { ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'informasirs') ? 'active link-light' : 'link-dark'; ?>" href="informasirs"><i class="bi bi-building"></i> Report </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light' : 'link-dark'; ?>" href="user"><i class="bi bi-person-gear"></i> user</a>
                            </li>
                            <li class="nav-item">
                                <a <?php echo (isset($_GET['x']) && $_GET['x'] == 'bangsal') ?> href="bangsal"></a>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>