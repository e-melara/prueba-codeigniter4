<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="<?= base_url('plugins/index.css'); ?>" />
    <?= $this->renderSection('css') ?>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?= $this->include('partials/header') ?>
      <?= $this->include('partials/sidebar') ?>
      <div class="content-wrapper"><?= $this->renderSection('content') ?></div>
      <?= $this->include('partials/footer') ?>
      <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    <!-- script -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <script src="<?= base_url('plugins/AdminLTE/js/adminlte.min.js') ?>"></script>
    <?= $this->renderSection('js') ?>
  </body>
</html>
