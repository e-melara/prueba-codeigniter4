<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;

use Exception;
use ReflectionException;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $rules = [
            "email" => 'required|min_length[6]|max_length[50]|valid_email',
            "password" => 'required|min_length[8]|max_length[100]|validateUser[email, password]',
        ];
        $errors = [
            'password' => [
                'validateUser' => 'Invalido login con la credeciales provista'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        if(!$this->validateRequest($input, $rules, $errors)) {
            return $this->getResponse(
                $this->validator->getErrors(),
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }
        return $this->getJWTForUser($input['email']);
    }

    private function getJWTForUser(string $emailAdress, int $responseCode = ResponseInterface::HTTP_OK)
    {
        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($emailAdress);
            unset($user['password']);

            helper('jwt');
            return $this->getResponse([
                "user" => $user,
                "message"   => 'Usuario Ingresado con exito',
                "token" => getSignedJWTForUser($emailAdress)
            ]);
        } catch (Exception $e) {
            return $this->getResponse([
                'error' => $e->getMessage(),
            ], $responseCode);
        }
    }
}
