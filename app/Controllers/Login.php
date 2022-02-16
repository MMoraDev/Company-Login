<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {       
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $model->where('Username', $username)->first();

        // If username or password are wrong
        $this->response->setStatusCode(403)->setBody(-1);


        if ($data) {
            if ($password == $data['Password']) {
                $sessionData = [
                    'userId'    => $data['User_ID'],
                    'username'  => $data['Username'],
                    'logged_in' => TRUE
                ];
                $session->set($sessionData);

                $this->response->setStatusCode(200)->setBody(1);
            }
        }

        $this->response->send();
    }
  
    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
}
