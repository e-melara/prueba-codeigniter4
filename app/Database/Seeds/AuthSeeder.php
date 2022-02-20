<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $numLimit = 10;
        for ($i=0; $i < $numLimit; $i++) { 
            $this->db->table('users')->insert($this->generateUser());
        }

        $this->db->table('users')->insert([
            "nombres" => "Edwin",
            "apellidos" => "Melara Landaverde",
            "email" => "melara0606@gmail.com",
            "password" => password_hash("1234567890", PASSWORD_BCRYPT),
            "rol"   => "ADMINISTRADOR",
        ]);
    }

    public function generateUser() : array
    {
        $factory = Factory::create();
        return [
            "nombres" => $factory->name(),
            "apellidos" => $factory->lastName(),
            "email" => $factory->email,
            "password" => password_hash("1234567890", PASSWORD_BCRYPT),
        ];
    }
}
