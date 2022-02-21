<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img
      src="<?= base_url('plugins/adminLTE/img/AdminLTELogo.png') ?>"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: 0.8"
    />
    <span class="brand-text font-weight-light">Administrador</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img
        src="<?= base_url('plugins/adminLTE/img/user.jpg') ?>"
          class="img-circle elevation-2"
          alt="User Image"
        />
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?= session()->full_name ?>
        </a>
      </div>
    </div>

    <nav class="mt-2">
      <ul
        role="menu"
        data-widget="treeview"
        data-accordion="false"
        class="nav nav-pills nav-sidebar flex-column"
      >
      <?php if(session()->is_admin == 1): ?>
        <li class="nav-item">
          <a href="<?= route_to('users') ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Usuario
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
      <?php endif ?>
        <li class="nav-item">
          <a href="<?= route_to('logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-arrow-right"></i>
            <p>Salir</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
