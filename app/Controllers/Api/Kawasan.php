<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Api\Api_model;

class Kawasan extends BaseController
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
        $tahun = $this->request->getGet('tahun');

        if ($kd_kab === null && $kd_kec === null && $kd_des === null && $tahun === null) {
            $kawasan = $this->Api_model->getkawasan();
        } else if (isset($kd_kab)) {
            $kawasan = $this->Api_model->getkawasan($kd_kab, $tahun);
        } else if (isset($kd_kec)) {
            $kawasan = $this->Api_model->getkawasanKec($kd_kec, $tahun);
        } else if (isset($kd_des)) {
            $kawasan = $this->Api_model->getkawasanDes($kd_des, $tahun);
        } else if (isset($tahun)) {
            $kawasan = $this->Api_model->getkawasanTahun($tahun);
        }

        if ($kawasan != null) {
            return $this->respond(['status' => true, 'data' => $kawasan]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
