<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\UserModel;

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

    public function store()
    {
        echo view('admin/usuarios/new');
    }

    public function create()
    {
        $rules = [
            "email"         => 'required|min_length[6]|max_length[50]|valid_email',
            "password"      => 'required|min_length[8]|max_length[100]',
            "nombres"       => 'required|min_length[3]|max_length[50]',
            "apellidos"     => 'required|min_length[6]|max_length[50]',
        ];
        $errors = [
            
        ];
        $inputs = $this->getRequestInput($this->request);
        $input = $this->getRequestInput($this->request);
        if(!$this->validateRequest($input, $rules, $errors)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $array = [
            "email" => $inputs['email'],
            "nombres" => $inputs['nombres'],
            "apellidos" => $inputs['apellidos'],
            "password" => $inputs['password']
        ];
        try {
            $model->insert($array);
            return redirect()->to('admin/users')->with('msg', [
                'type' => 'success',
                'message' => 'Se ha creado con exito al usuario'
            ]);
        } catch (\Exception $e) {
            return redirect()->to('admin/users')->with('msg', [
                'type' => 'danger',
                'message' => $e->getMessage(),
                "err" => $e->getMessage()
            ]);
        }



    }

    public function update()
    {
        $input = $this->getRequestInput($this->request);
        $model = new UserModel();
        $user = $model->getById($input['id']);
        $data = [
            "status" => $user['status'] === 'ACTIVO' ? 'INACTIVO' : 'ACTIVO',
        ];

        if ($model->update($input['id'], $data)) {
            $user = $model->where('id', $input['id'])->select('id, nombres, apellidos, email, rol, status')->first();
            return $this->getResponse([
                "message" => "Se ha actualizado con exito el estado del usuario",
                "ok" => true, 
                "user" => $user
            ]);
        }else{
            return $this->getResponse([
                "message" => "El usuario no se encuentra en la base de datos",
                "ok" => true
            ]);
        }
    }

    public function delete($id = null)
    {
        $input = $this->getRequestInput($this->request);
        $user = $this->model->getById($input['id']);

        if($user) {
            $this->model->delete($input['id']);
            return $this->getResponse([
                "message" => "Se ha eliminado con exito al usuario",
                "ok" => true
            ]);
        }else {
            return $this->getResponse([
                "message" => "El usuario no se encuentra en la base de datos",
                "ok" => true
            ]);
        }
    }
}
