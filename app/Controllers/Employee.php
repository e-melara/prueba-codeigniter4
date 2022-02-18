<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

use App\Models\EmployeeModel;

class Employee extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new EmployeeModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }

    // create
    public function create()
    {
        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
        ];
        $model->insert($data);

        $reponse = [
            "status" => 201,
            "error"  => "null",
            "message" => [
                "success" => "Employee created successfully"
            ]
        ];

        return $this->respondCreated($reponse);
    }

    // single user
    public function show($id = null)
    {
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->first();

        if($data) {
            return $this->respond($data);
        }else{
            return $this->failNotFound('No employee found');
        }
    }

    // update user
    public function update($id = null)
    {
        $model = new EmployeeModel();
        $id = $this->request->getVar('id');

        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];

        $model->update($id, $data);
        $reponse = [
            "status" => 200,
            "error"  => "null",
            "message" => [
                "success" => "Employee updated successfully"
            ]
        ];
        return $this->respond($reponse);
    } 

    // delete user
    public function delete($id = null)
    {
        $model = new EmployeeModel();
        $data = $model->where('id', $id)->delete($id);

        if($data) {
            $model->delete($id);
            $reponse = [
                "status" => 200,
                "error"  => "null",
                "message" => [
                    "success" => "Employee deleted successfully"
                ]
            ];
            return $this->respondDeleted($reponse);
        }else{
            return $this->failNotFound('No employee found');
        }
    }
}
