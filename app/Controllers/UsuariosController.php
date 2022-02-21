<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsuariosController extends BaseController
{
    public function __construct()
    {
        $this->model = model('App\models\UserModel', false);
    }

    public function index()
    {
        $all = $this->model->where('rol', 'USUARIO')->findAll();
        echo view('admin/usuarios/index', [
            'usuarios'  => $all,
        ]);
    }
}
