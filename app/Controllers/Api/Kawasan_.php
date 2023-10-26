<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Api\Api_model;

class Kawasan_ extends BaseController
{
    use ResponseTrait;
    protected $Api_model;

    public function __construct()
    {
        $this->Api_model = new Api_model();
    }

    public function index()
    {
        $data = $this->request->getGet('data');

        if ($data === null) {
            $kawasan = $this->Api_model->getkawasan();
        } else if ($data === 'total_desa') {
            $kawasan = $this->Api_model->getkawasanTotalDesa($data);
        } else if ($data === 'total_kawasan') {
            $kawasan = $this->Api_model->getkawasanTotalKawasan($data);
        } else if ($data === 'reg_tk_kawasan') {
            $kawasan = $this->Api_model->getkawasan_reg_tk_kawasan($data);
        } else if ($data === 'reg_tk_kabupaten') {
            $kawasan = $this->Api_model->getkawasan_reg_tk_kabupaten($data);
        } else if ($data === 'tema_kawasan') {
            $kawasan = $this->Api_model->getkawasan_tema_kawasan($data);
        } else if ($data === 'jml_kawasan_perkab') {
            $kawasan = $this->Api_model->getkawasan_jml_kawasan_perkab($data);
        }

        if ($kawasan != null) {
            return $this->respond(['status' => true, 'data' => $kawasan]);
        } else {
            return $this->failNotFound("Value/key tidak ditemukan!");
        }
    }
}
