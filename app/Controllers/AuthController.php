<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{

    public function __construct()
    {
        $this->model = model('App\models\UserModel', false);
    }

    public function index()
    {
        $session = session();
        if($session->is_logged) {
            $routeName = $session->is_admin ? 'admin' : 'usuario';
            return redirect()->to($routeName);
        }
        echo view('login');
    }

    public function create()
    {
        $rules = [
            "email" => 'required|min_length[6]|max_length[50]|valid_email',
            "password" => 'required|min_length[8]|max_length[100]|validateUser[email, password]',
        ];
        $errors = [
            'password' => [
                'validateUser' => 'Las credeciales son invalidas'
            ],
            "email" =>[
                "valid_email" => 'Debe ingresar un correo electronico valido'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        if(!$this->validateRequest($input, $rules, $errors)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $user = $this->model->findUserByEmailAddress($input['email']);

        if($user['status'] === 'INACTIVO') {
            return redirect()->route('login')->with('msg', [
                'type' => 'info',
                "message" => 'Por el momento el usuario no esta activo.'
            ]);
        }

        session()->set([
            "id" => $user['id'],
            "is_logged" => true,
            "username" => $user['email'],
            "is_admin"  => $user['rol'] === 'ADMINISTRADOR',
            "full_name" => $user['nombres']." ".$user['apellidos'],
        ]);

        $routeName = 'admin';
        if($user['rol'] === 'USUARIO') {
            $routeName = 'usuario';
        }
        
        return redirect()->to($routeName)->with('msg', [
            "type" => "success",
            "message" => "Bienvenid@ ".$user['nombres']." ".$user['apellidos']
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
