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

    public function getkawasanTotalDesa($data = null)
    {
        if ($data != null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('tahun_pembentukan, COUNT(DISTINCT kd_des) total_desa');
            $builder->where('kd_des !=', NULL);
            $builder->groupBy('tahun_pembentukan');
            return $builder->get()->getResultArray();
        }
    }

    public function getkawasanTotalKawasan($data = null)
    {
        if ($data != null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select('tahun_pembentukan, COUNT(DISTINCT kd_kab, kd_kawasan) total_kawasan');
            $builder->where('nm_kawasan !=', NULL);
            $builder->groupBy('tahun_pembentukan');
            return $builder->get()->getResultArray();
        }
    }

    public function getkawasan_reg_tk_kawasan($data = null)
    {
        if ($data != null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE sk_lokasi_kawasan != 'BELUM') AS sudah_sk_lokasi_kawasan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE sk_lokasi_kawasan = 'BELUM') AS belum_sk_lokasi_kawasan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE sk_tkpkp_kawasan != 'BELUM') AS sudah_sk_tkpkp_kawasan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE sk_tkpkp_kawasan = 'BELUM') AS belum_sk_tkpkp_kawasan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE perbup_rpkp != 'BELUM') AS sudah_perbup_rpkp", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE perbup_rpkp = 'BELUM') AS belum_perbup_rpkp", FALSE);
            $builder->limit(1);
            return $builder->get()->getResult();
        }
    }

    public function getkawasan_reg_tk_kabupaten($data = null)
    {
        if ($data != null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE sk_tkpkp_kab_pembangunan != 'BELUM') AS sudah_sk_tkpkp_kab_pembangunan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE sk_tkpkp_kab_pembangunan = 'BELUM') AS belum_sk_tkpkp_kab_pembangunan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE perbup_pembangunan != 'BELUM') AS sudah_perbup_pembangunan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE perbup_pembangunan = 'BELUM') AS belum_perbup_pembangunan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE perda_kab_pembangunan != 'BELUM') AS sudah_perda_kab_pembangunan", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE perda_kab_pembangunan = 'BELUM') AS belum_perda_kab_pembangunan", FALSE);
            $builder->limit(1);
            return $builder->get()->getResult();
        }
    }

    public function getkawasan_tema_kawasan($data = null)
    {
        if ($data != null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE klasifikasi = 'PERTANIAN TANAMAN PANGAN') AS PERTANIAN_TANAMAN_PANGAN", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE klasifikasi = 'WISATA') AS WISATA", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE klasifikasi = 'PERKEBUNAN') AS PERKEBUNAN", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE klasifikasi = 'PERIKANAN') AS PERIKANAN", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE klasifikasi = 'PETERNAKAN') AS PETERNAKAN", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE klasifikasi = 'INDUSTRI RUMAHAN') AS INDUSTRI_RUMAHAN", FALSE);
            $builder->limit(1);
            return $builder->get()->getResult();
        }
    }

    public function getkawasan_jml_kawasan_perkab($data = null)
    {
        if ($data != null) {
            $builder = $this->db->table('sikaperdes_kawasan_bank_data');
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.01') AS CILACAP_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.01') AS CILACAP_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.02') AS BANYUMAS_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.02') AS BANYUMAS_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.03') AS PURBALINGGA_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.03') AS PURBALINGGA_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.04') AS BANJARNEGARA_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.04') AS BANJARNEGARA_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.05') AS KEBUMEN_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.05') AS KEBUMEN_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.06') AS PURWOREJO_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.06') AS PURWOREJO_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.07') AS WONOSOBO_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.07') AS WONOSOBO_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.08') AS MAGELANG_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.08') AS MAGELANG_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.09') AS BOYOLALI_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.09') AS BOYOLALI_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.10') AS KLATEN_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.10') AS KLATEN_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.11') AS SUKOHARJO_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.11') AS SUKOHARJO_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.12') AS WONOGIRI_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.12') AS WONOGIRI_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.13') AS KARANGANYAR_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.13') AS KARANGANYAR_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.14') AS SRAGEN_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.14') AS SRAGEN_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.15') AS GROBOGAN_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.15') AS GROBOGAN_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.16') AS BLORA_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.16') AS BLORA_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.17') AS REMBANG_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.17') AS REMBANG_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.18') AS PATI_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.18') AS PATI_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.19') AS KUDUS_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.19') AS KUDUS_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.20') AS JEPARA_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.20') AS JEPARA_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.21') AS DEMAK_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.21') AS DEMAK_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.22') AS SEMARANG_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.22') AS SEMARANG_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.23') AS TEMANGGUNG_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.23') AS TEMANGGUNG_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.24') AS KENDAL_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.24') AS KENDAL_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.25') AS BATANG_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.25') AS BATANG_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.26') AS PEKALONGAN_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.26') AS PEKALONGAN_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.27') AS PEMALANG_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.27') AS PEMALANG_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.28') AS TEGAL_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.28') AS TEGAL_KP", FALSE);
            $builder->limit(1);

            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE verifikasi = 'disetujui' AND kd_kab = '33.29') AS BREBES_KP_VERIFIKASI", FALSE);
            $builder->limit(1);
            $builder->select("(select COUNT(DISTINCT kd_kab, kd_kawasan) FROM sikaperdes_kawasan_bank_data WHERE kd_kab = '33.29') AS BREBES_KP", FALSE);
            $builder->limit(1);

            return $builder->get()->getResult();
        }
    }
}
