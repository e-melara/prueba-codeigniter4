<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        "nombres", "apellidos", "email", "password", 'status'
    ];

    // Dates
    protected $updatedField  = 'updated_at';

    // Callbacks
    protected $beforeInsert   = ["beforeInsert"];
    protected $beforeUpdate   = ["beforeUpdate"];

    public function beforeInsert(array $data)
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    public function beforeUpdate(array $data)
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array
    {
        if(isset($data['data']['password'])){
            $plainTextPassword = $data['data']['password'];
            $data['data']['password'] = $this->hashPassword($plainTextPassword);
        }
        return $data;
    }


    private function hashPassword(string $plainTextPassword): string
    {
        return password_hash($plainTextPassword, PASSWORD_BCRYPT);
    }

    // methods findByEmailUser
    public function findUserByEmailAddress(string $emailAdress)
    {
        $user = $this->asArray()->where('email', $emailAdress)->first();
        return $user;
    }

    public function getById($user_id)
    {
        $user = $this->where('id', $user_id)->first();
        return $user;
    }
}
