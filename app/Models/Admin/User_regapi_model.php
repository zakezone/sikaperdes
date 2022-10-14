<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class User_regapi_model extends Model
{
    protected $table = 'auth_api_key';
    protected $primaryKey = 'id';
    protected $AllowedFields = ['email', 'password', 'aplication'];

    public function defaultgetApiUser()
    {
        $builder = $this->table('auth_api_key');
        $builder->orderBy('created', 'DESC');
        return $builder;
    }

    public function getApiUser($cari)
    {
        $builder = $this->table('auth_api_key');
        $builder->like('email', $cari, 'both');
        $builder->orLike('aplication', $cari, 'both');
        $builder->orderBy('created', 'DESC');
        return $builder;
    }
}
