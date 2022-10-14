<?php

namespace App\Models\Api;

use CodeIgniter\Model;
use Exception;

class Api_key_model extends Model
{
    protected $table = 'auth_api_key';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'aplication'];

    function getEmail($email)
    {
        $builder = $this->table('auth_api_key');
        $data = $builder->where('email', $email)->first();
        if (!$data) {
            throw new Exception('Data otentikasi tidak ditemukan');
        }
        return $data;
    }
}
