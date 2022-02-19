<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "integer",
                "constraint" => "5",
                "unsigned" => true,
                "auto_increment" => true
            ],
            "nombres" => [
                "type" => "VARCHAR",
                "constraint" => "100",
                "null" => false
            ],
            "apellidos" => [
                "type" => "VARCHAR",
                "constraint" => "100",
                "null" => false
            ],
            "email" => [
                "type" => "VARCHAR",
                "constraint" => "100",
                "null" => false,
                "unique" => true
            ],
            "password" => [
                "type" => "VARCHAR",
                "constraint" => "100",
                "null" => false
            ],
            "status" => [
                "type" => "ENUM",
                "constraint" => ['ACTIVO', 'INACTIVO'],
                "default"   => 'ACTIVO'
            ],
            "rol" => [
                "type" => "ENUM",
                "constraint" => ['ADMINISTRADOR', 'USUARIO'],
                "default" => 'USUARIO'
            ],
            "updated_at" => [
                "type" => "datetime",
                "null" => true
            ],
            "created_at datetime default current_timestamp"
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
