<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Api\Api_key_model;

class Auth extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $validation = \Config\Services::validation();

        $aturan = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Silahkan masukan email',
                    'valid_email' => 'Silahkan masukan email yang valid'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan masukan password'
                ]
            ]
        ];
        $validation->setRules($aturan);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $model = new Api_key_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $model->getEmail($email);
        if (!password_verify($password, $data['password'])) {
            return $this->fail('Password tidak sesuai');
        }

        helper('jwt');
        $response = [
            'message' => 'Otentikasi berhasil',
            'data' => $data,
            'access_token' => createJWT($email)
        ];
        return $this->respond($response);
    }
}
