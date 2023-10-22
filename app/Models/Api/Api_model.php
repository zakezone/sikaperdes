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

    public function getkawasan($kd_kab = null, $tahun = null)
    {
        if ($kd_kab === null && $tahun === null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->get()->getResultArray();
        } else if ($kd_kab != null && $tahun === null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->getWhere(['LEFT(kd_des,5)' => $kd_kab])->getResultArray();
        } else {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->getWhere(['LEFT(kd_des,5)' => $kd_kab, 'tahun' => $tahun])->getResultArray();
        }
    }

    public function getkawasanKec($kd_kec = null, $tahun = null)
    {
        if ($kd_kec === null && $tahun === null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->get()->getResultArray();
        } else if ($kd_kec != null && $tahun === null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->getWhere(['LEFT(kd_des,8)' => $kd_kec])->getResultArray();
        } else {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->getWhere(['LEFT(kd_des,8)' => $kd_kec, 'tahun' => $tahun])->getResultArray();
        }
    }

    public function getkawasanDes($kd_des = null, $tahun = null)
    {
        if ($kd_des === null && $tahun === null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->get()->getResultArray();
        } else if ($kd_des != null && $tahun === null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->getWhere(['kd_des' => $kd_des])->getResultArray();
        } else {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->getWhere(['kd_des' => $kd_des, 'tahun' => $tahun])->getResultArray();
        }
    }

    public function getkawasanTahun($tahun = null)
    {
        if ($tahun === null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->get()->getResultArray();
        } else {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('id, nm_kab, nm_kec, nm_des, kd_des, nm_kawasan, kd_kawasan, sk_lokasi_kawasan, sk_tkpkp_kawasan, perbup_rpkp, perda_kab_pembangunan, perbup_pembangunan, sk_tkpkp_kab_pembangunan, klasifikasi, tahun_pembentukan, verifikasi');
            return $builder->getWhere(['tahun' => $tahun])->getResultArray();
        }
    }
}
