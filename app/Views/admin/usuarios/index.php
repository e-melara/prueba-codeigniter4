<?= $this->extend('app') ?>
<?= $this->section('title') ?> Admin:: Usuarios
<?= $this->endsection() ?>

<?= $this->section('css') ?>
<link
  rel="stylesheet"
  type="text/css"
  href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"
/>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Bienvenido</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Listado de usuarios
            <div class="card-tools">
              <button class="btn btn-primary">Nuevo</button>
            </div>
          </div>
          <div class="card-body">
            <table
              id="table"
              style="width: 100%"
              class="table table-striped table-bordered"
            >
              <thead>
                <tr>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Email</th>
                  <th>Rol</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usuarios as $key =>
                $usuario) : ?>
                <tr>
                  <td><?= $usuario['nombres'] ?></td>
                  <td><?= $usuario['apellidos'] ?></td>
                  <td><?= $usuario['email'] ?></td>
                  <td width="50">
                    <div class="badge bg-info">
                      <span><?= $usuario['rol'] ?></span>
                    </div>
                  </td>
                  <td width="50">
                    <div
                      class="badge bg-<?= $usuario['status'] === 'ACTIVO' ? 'success' : 'danger' ?>"
                    >
                      <?= $usuario['status'] ?>
                    </div>
                  </td>
                  <td width="160px">
                    <div class="btn-group">
                      <button
                        data-id='<?= $usuario["id"] ?>'
                        class="btn btn-warning btn-sm update"
                      >
                        <?= $usuario['status'] === 'ACTIVO' ? 'DESCATIVAR' : 'ACTIVAR' ?>
                      </button>
                      <button
                        data-id='<?= $usuario["id"] ?>'
                        class="btn btn-danger btn-sm delete"
                      >
                        Borrar
                      </button>
                    </div>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?= $this->endSection() ?>

  <?= $this->section('js') ?>
  <script
    type="text/javascript"
    src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"
  ></script>
  <script type="text/javascript">
    $(function () {
      let table = $("#table").DataTable();

      $(".delete").on("click", function () {
        table.row($(this).parents("tr")).remove().draw();
      });

      $(".update").on("click", function () {});
    });
  </script>
  <?= $this->endsection() ?>
</section>
