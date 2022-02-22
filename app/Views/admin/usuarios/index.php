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
      <?php if(session('msg')): ?>
        <div class="alert alert-<?= session('msg.type') ?> alert-dismissible">
          <button type="button" class="close float-left" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
          <?= session('msg.message') ?>
        </div>
      <?php endif ?>
        <div class="card">
          <div class="card-header">
            Listado de usuarios
            <div class="card-tools">
              <a href="<?= route_to('new') ?>" class="btn btn-primary">Nuevo</a>
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
                        Estado
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src='<?= base_url('js/fetch.js') ?>' ></script>
  <script type="text/javascript">
    $(function () {
      let table = $("#table").DataTable();

      $('body').on('click', '.delete', function () {
        const data = $(this).data()
        Swal.fire({
          title: 'Eliminar',
          text: "¿Esta Seguro que desea eliminar al usuario?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si'
        }).then((result) => {
          if (result.isConfirmed) {
            useFetch('users/delete/' + data.id, { id: data.id }, 'DELETE').then(data => {
              const ok = data.ok;
              if(ok) {
                // Eliminamos la fila donde se encuentra el usuario
                table.row($(this).parents("tr")).remove().draw();
                Swal.fire(
                  'Exito!',
                  data.message,
                  'success'
                )
              }else{
                Swal.fire(
                  'Exito!',
                  data.message,
                  'error'
                )
              }
            });
          }
        })
      })

      $('body').on('click', '.update', function () {
        const data = $(this).data()
        Swal.fire({
          title: 'Actualizar',
          text: "¿Esta Seguro que desea actualizar el estado del usuario?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, lo actualizare'
        }).then((result) => {
          if (result.isConfirmed) {
            useFetch('users/update/' + data.id, { id: data.id }, 'PUT').then(data => {
              if(data.ok) {
                const className = data.user.status === 'ACTIVO' ? 'bg-success' : 'bg-danger';
                let temp = table.row($(this).parents("tr")).data();
                temp[4] = "<div class='badge "+ className +"'>\n"+ data.user.status +"</div>"
                table.row($(this).parents("tr")).data(temp).draw();
                Swal.fire(
                  'Actualizado!',
                  data.message,
                  'success'
                )
              }else {
                Swal.fire(
                  'Actualizado!',
                  data.message,
                  'error'
                )
              }
            })
          }
        })
      })
    });
  </script>
  <?= $this->endsection() ?>
</section>
