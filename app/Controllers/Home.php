<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('admin/index');
    }

    public function usuario()
    {
        return view('usuario/index');
    }
}
