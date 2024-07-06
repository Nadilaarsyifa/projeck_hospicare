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
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'beranda') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>" aria-current="page" href="beranda"><i class="bi bi-house-door"></i> Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'informasikamar') ? 'active link-light' : 'link-dark'; ?>" href="informasikamar"><i class="bi bi-door-open"></i> Informasi Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pendaftar') ? 'active link-light' : 'link-dark'; ?>" href="pendaftar"><i class="bi bi-people"></i> Pasien/Pendaftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'poliklinik') ? 'active link-light' : 'link-dark'; ?>" href="poliklinik"><i class="bi bi-lungs"></i> Informasi Poliklinik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pendaftaran') ? 'active link-light' : 'link-dark'; ?>" href="pendaftaran"><i class="bi bi-journal-text"></i> Pendaftaran Online</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'berita') ? 'active link-light' : 'link-dark'; ?>" href="berita"><i class="bi bi-newspaper"></i> Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'kontak') ? 'active link-light' : 'link-dark'; ?>" href="kontak"><i class="bi bi-telephone"></i> Kontak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'feedback') ? 'active link-light' : 'link-dark'; ?>" href="feedback"><i class="bi bi-chat-text"></i> Feedback</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>