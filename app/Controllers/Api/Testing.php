<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Api\Api_model;

class Testing extends BaseController
{
    use ResponseTrait;
    protected $Api_model;

    public function __construct()
    {
        $this->Api_model = new Api_model();
    }

    public function index()
    {
        $kd_kab = $this->request->getGet('kd_kab');
        $kd_kec = $this->request->getGet('kd_kec');
        $kd_des = $this->request->getGet('kd_des');
        // $tahun = $this->request->getGet('tahun');

        if ($kd_kab === null && $kd_kec === null && $kd_des === null) {
            $bumdes = $this->Api_model->getTestingApi();
        } else if (isset($kd_kab)) {
            $bumdes = $this->Api_model->getTestingApi($kd_kab);
        } else if (isset($kd_kec)) {
            $bumdes = $this->Api_model->getTestingApiKec($kd_kec);
        } else if (isset($kd_des)) {
            $bumdes = $this->Api_model->getTestingApiDes($kd_des);
        }

        if ($bumdes != null) {
            return $this->respond(['status' => true, 'data' => $bumdes]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
