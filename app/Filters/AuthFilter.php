<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use CodeIgniter\Exceptions\PageNotFoundException;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        if(!$session->is_logged) {
            return redirect()->route('login')->with('msg', [
                'type' => 'warning',
                "message" => 'Para poder ingresar al modulo debe estar logeado'
            ]);
        }
        $model = model('App\models\UserModel');
        if(!$user = $model->getById($session->id)){
            $session->destroy();
            return redirect()->route('login')->with('msg', [
                'type' => 'danger',
                "message" => 'El usuario actualmente no esta disponible'
            ]);
        }

        if(!in_array(strtolower($user['rol']), $arguments)) {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
