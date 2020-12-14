<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('') ?>" class="brand-link">
      <img src="<?= base_url() ?>/img/logo_white.jpg" alt="RSUD SKH Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">RSUD Sukoharjo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a class="d-block"><i class="nav-icon fas fa-user-circle"></i>&nbsp;&nbsp;&nbsp;<?= session()->get('nama_user') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if (session()->get('level') == 1) { ?>
            <li class="nav-item">
              <a href="<?= base_url('admin') ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/datakepeg') ?>" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                  Data Kepegawaian
                </p>
              </a>
            </li>
          <?php } ?>
          <?php if (session()->get('level') == 2) { ?>
          <li class="nav-item">
            <a href="<?= base_url('kepeg') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kepeg/datakepeg') ?>" class="nav-link">
              <i class="nav-icon fas fa-book-medical"></i>
              <p>
                Data SIK / SIP
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if (session()->get('level') == 3) { ?>
          <li class="nav-item">
            <a href="<?= base_url('peg') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('peg/datakepeg') ?>" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Arsip File Pegawai
              </p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>