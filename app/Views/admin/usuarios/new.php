<?= $this->extend('app') ?>
<?= $this->section('title') ?> Admin:: Usuarios :: Nuevo
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Nuevo usuario</h1>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form action="/admin/users" method="post" autocomplete="off">
          <div class="card">
            <div class="card-header">
              Listado de usuarios
              <div class="card-tools">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="nombres">Nombres: </label>
                <input
                  required
                  type="text"
                  value="<?= old('nombres') ?>"
                  class="form-control <?= session('errors.nombres') ? 'is-invalid' : '' ?>"
                  id="nombres"
                  name="nombres"
                  placeholder="Ingrese los nombres del usuario"
                />
                <?php if(session('errors.nombres')): ?>
                <span id="password" class="error invalid-feedback">
                  <?= session('errors.nombres'); ?>
                </span>
                <?php endif ?>
              </div>
              <div class="form-group">
                <label for="apellidos">Apellidos: </label>
                <input
                  required
                  type="text"
                  value="<?= old('apellidos') ?>"
                  class="form-control <?= session('errors.apellidos') ? 'is-invalid' : '' ?>"
                  id="apellidos"
                  name="apellidos"
                  placeholder="Ingrese los apellidos del usuario"
                />
                <?php if(session('errors.apellidos')): ?>
                <span id="password" class="error invalid-feedback">
                  <?= session('errors.apellidos'); ?>
                </span>
                <?php endif ?>
              </div>
              <div class="form-group">
                <label for="email">Correo Electronico: </label>
                <input
                  required
                  type="email"
                  value="<?= old('email') ?>"
                  class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                  id="email"
                  name="email"
                  placeholder="El Correo electronico del usuario"
                />
                <?php if(session('errors.email')): ?>
                <span id="emailspan" class="error invalid-feedback">
                  <?= session('errors.email'); ?>
                </span>
                <?php endif ?>
              </div>
              <div class="form-group">
                <label for="password">Contraseña: </label>
                <input
                  required
                  type="password"
                  class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
                  id="password"
                  name="password"
                  placeholder="Ingrese la contraseña del usuario"
                />
                <?php if(session('errors.password')): ?>
                <span id="password" class="error invalid-feedback">
                  <?= session('errors.password'); ?>
                </span>
                <?php endif ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?= $this->endsection() ?>
