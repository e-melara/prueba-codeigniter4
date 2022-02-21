<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('plugins/index.css'); ?>" />
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <?php if(session('msg')): ?>
        <div class="alert alert-<?= session('msg.type') ?> alert-dismissible">
          <button type="button" class="close float-left" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
          <?= session('msg.message') ?>
        </div>
      <?php endif ?>
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="h1"><b>Administrador</a>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Logea para poder iniciar session</p>
          <form action="<?= route_to('login') ?>" method="post" autocomplete="off">
            <div class="input-group mb-3">
              <input 
                type="email" 
                required 
                class="form-control <?= session('errors.email') ? 'is-invalid' : ''  ?>"  
                name="email" 
                class="form-control"  
                placeholder="Email" 
                value="<?= old('email') ?>"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              <?php if(session('errors.email')): ?>
                  <span id="password" class="error invalid-feedback">
                    <?= session('errors.email'); ?>
                  </span>
                <?php endif ?>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <input
                  name="password"
                  type="password"
                  required
                  class="form-control <?= session('errors.password') ? 'is-invalid' : ''  ?>"
                  placeholder="Password"
                  aria-invalid="true"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <?php if(session('errors.password')): ?>
                  <span id="password" class="error invalid-feedback">
                    <?= session('errors.password'); ?>
                  </span>
                <?php endif ?>
              </div>
            </div>
            <div class="row">
              <div class="col-8"></div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                  Sign In
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- script -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <script src="<?= base_url('plugins/AdminLTE/js/adminlte.min.js') ?>"></script>
  </body>
</html>
