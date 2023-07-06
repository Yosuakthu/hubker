    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
                <img src="img/poli.png" alt="Polnustar" height="45px" width="45px">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Bidang 4</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <?php if ($_SESSION["id_level"] == 1) : ?>
            <li class="menu-item">
              <a href="user.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Basic">user</div>
              </a>
            </li>
            <?php endif ?> 
             <li class="menu-item">
              <a href="dc.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-copy-alt"></i>
                <div data-i18n="Basic">Document Kerjasama</div>
              </a>
            </li>
            <?php if ($_SESSION["id_level"] == 1) : ?>
             <li class="menu-item">
              <a href="p_dc.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                <div data-i18n="Basic">Permintaan Kerjasama</div>
              </a>
            </li>
            <?php endif ?> 
             <li class="menu-item">
              <a href="tamba_dc.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                <div data-i18n="Basic">Input Document</div>
              </a>
            </li>
             
             <li class="menu-item">
              <a href="logout.php" class="menu-link" onclick="return confirm('Andah Yakin Ingin Keluar');">
                <i class="menu-icon tf-icons bx bx-power-off"></i>
                <div data-i18n="Basic">Log Out</div>
              </a>
            </li>
        </aside>
        <!-- / Menu -->