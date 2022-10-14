<?php

namespace App\Models\Api;

use CodeIgniter\Database\BaseBuilder;

class Api_model extends BaseBuilder
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getTestingApi($kd_kab = null)
    {
        $builder = $this->db->table('testing_api');
        if ($kd_kab === null) {
            $builder->select('*');
            return $builder->get()->getResultArray();
        } else {
            $builder->select('*');
            return $builder->getWhere(['LEFT(kd_wilayah,5)' => $kd_kab])->getResultArray();
        }
    }

    public function getTestingApiKec($kd_kec = null)
    {
        if ($kd_kec === null) {
            $builder = $this->db->table('testing_api');
            $builder->select('*');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('testing_api');
            $builder->select('*');
            return $builder->getWhere(['LEFT(kd_wilayah,8)' => $kd_kec])->getResultArray();
        }
    }

    public function getTestingApiDes($kd_des = null)
    {
        if ($kd_des === null) {
            $builder = $this->db->table('testing_api');
            $builder->select('*');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('testing_api');
            $builder->select('*');
            return $builder->getWhere(['kd_wilayah' => $kd_des])->getResultArray();
        }
    }
}
