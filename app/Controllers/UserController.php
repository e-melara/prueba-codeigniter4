<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Exception;

class UserController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $all = $this->request->getVar('all');
        $user = model('App\models\UserModel');
        if(empty($all) || $all !== 'true') {
            $user->where('rol', 'USUARIO');
        }
        return $this->getResponse(
            $user->select(
                'id, email, nombres, apellidos, status, rol, created_at'
            )->findAll()
        );
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = model('App\models\UserModel');
        $user = $model->where('id', $id)->first();

        if($user) {
            return $this->getResponse(
                $user
            );
        }

        return $this->getResponse(
            [
                "error" => true,
                "message" => "Usuario no encontrado"
            ],
            ResponseInterface::HTTP_NOT_FOUND
        );
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            "nombres" => 'required',
            "apellidos" => 'required',
            "email" => 'required|min_length[6]|max_length[50]|valid_email',
            "password" => 'required|min_length[8]|max_length[100]'
        ];
        $model = model('App\models\UserModel');
        $inputs = $this->getRequestInput($this->request);
        
        if(!$this->validateRequest($inputs, $rules)) {
            return $this->getResponse(
                $this->validator->getErrors(),
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }

        $email = $inputs['email'];
        $model->save($inputs);
        $user = $model->findUserByEmailAddress($email);
        return $this->getResponse([
            "message" => "Exito!",
            "users" => $user
        ]);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($email = null)
    {
        $model = model('App\models\UserModel');
        try {
            $user = $model->findUserByEmailAddress($email);
            
            $model->delete($user['id']);
            return $this->getResponse(
                [
                    "message" => "Usuario eliminado con exito!",
                    "users" => $user
                ]
            );
        } catch (\Exception $e) {
            return $this->getResponse(
                ["message" => $e->getMessage()],
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }
    }
}
