<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\User_admin_model;
use App\Models\Admin\User_regapi_model;
use App\Models\Filterdatadukcapil\Filtkabupaten;
use App\Models\Filterdatadukcapil\Filtkecamatan;
use App\Models\Filterdatadukcapil\Filtkeldesa;

class Admin extends BaseController
{
    protected $Admin_model;
    protected $Regapi_model;
    protected $Filterdatakabupaten_model;
    protected $Filterdatakecamatan_model;
    protected $Filterdatakeldesa_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Admin_model = new User_admin_model();
        $this->Regapi_model = new User_regapi_model();
        $this->Filterdatakabupaten_model = new Filtkabupaten();
        $this->Filterdatakecamatan_model = new Filtkecamatan();
        $this->Filterdatakeldesa_model = new Filtkeldesa();
        helper('zakezone');
    }

    public function dashboard()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');

        $klasifikasi_ptp = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('klasifikasi', 'PERTANIAN TANAMAN PANGAN')->get()->getResultArray();
        $klasifikasi_wisata = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('klasifikasi', 'WISATA')->get()->getResultArray();
        $klasifikasi_perkebunan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('klasifikasi', 'PERKEBUNAN')->get()->getResultArray();
        $klasifikasi_perikanan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('klasifikasi', 'PERIKANAN')->get()->getResultArray();
        $klasifikasi_peternakan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('klasifikasi', 'PETERNAKAN')->get()->getResultArray();
        $klasifikasi_ir = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('klasifikasi', 'INDUSTRI RUMAHAN')->get()->getResultArray();

        $agregat_kp2016 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2016')->get()->getResultArray();
        $agregat_kp2017 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2017')->get()->getResultArray();
        $agregat_kp2018 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2018')->get()->getResultArray();
        $agregat_kp2019 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2019')->get()->getResultArray();
        $agregat_kp2020 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2020')->get()->getResultArray();
        $agregat_kp2021 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2021')->get()->getResultArray();
        $agregat_kp2022 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2022')->get()->getResultArray();
        $agregat_kp2023 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2023')->get()->getResultArray();
        $agregat_kp2024 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2024')->get()->getResultArray();
        $agregat_kp2025 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2025')->get()->getResultArray();
        $agregat_kp2026 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2026')->get()->getResultArray();
        $agregat_kp2027 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2027')->get()->getResultArray();
        $agregat_kp2028 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2028')->get()->getResultArray();
        $agregat_kp2029 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2029')->get()->getResultArray();
        $agregat_kp2030 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('tahun_pembentukan', '2030')->get()->getResultArray();

        $agregat_ds2016 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2016')->get()->getResultArray();
        $agregat_ds2017 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2017')->get()->getResultArray();
        $agregat_ds2018 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2018')->get()->getResultArray();
        $agregat_ds2019 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2019')->get()->getResultArray();
        $agregat_ds2020 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2020')->get()->getResultArray();
        $agregat_ds2021 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2021')->get()->getResultArray();
        $agregat_ds2022 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2022')->get()->getResultArray();
        $agregat_ds2023 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2023')->get()->getResultArray();
        $agregat_ds2024 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2024')->get()->getResultArray();
        $agregat_ds2025 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2025')->get()->getResultArray();
        $agregat_ds2026 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2026')->get()->getResultArray();
        $agregat_ds2027 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2027')->get()->getResultArray();
        $agregat_ds2028 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2028')->get()->getResultArray();
        $agregat_ds2029 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2029')->get()->getResultArray();
        $agregat_ds2030 = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_des')->distinct()->where('tahun_pembentukan', '2030')->get()->getResultArray();

        $sk_lokasi_kawasan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('sk_lokasi_kawasan !=', 'BELUM')->get()->getResultArray();
        $sk_lokasi_kawasan_belum = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('sk_lokasi_kawasan', 'BELUM')->get()->getResultArray();
        $sk_tkpkp_kawasan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('sk_tkpkp_kawasan !=', 'BELUM')->get()->getResultArray();
        $sk_tkpkp_kawasan_belum = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('sk_tkpkp_kawasan', 'BELUM')->get()->getResultArray();
        $perbup_rpkp = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('perbup_rpkp !=', 'BELUM')->get()->getResultArray();
        $perbup_rpkp_belum = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('perbup_rpkp', 'BELUM')->get()->getResultArray();
        $perda_kab_pembangunan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('perda_kab_pembangunan !=', 'BELUM')->get()->getResultArray();
        $perda_kab_pembangunan_belum = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('perda_kab_pembangunan', 'BELUM')->get()->getResultArray();
        $perbup_pembangunan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('perbup_pembangunan !=', 'BELUM')->get()->getResultArray();
        $perbup_pembangunan_belum = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('perbup_pembangunan', 'BELUM')->get()->getResultArray();
        $sk_tkpkp_kab_pembangunan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('sk_tkpkp_kab_pembangunan !=', 'BELUM')->get()->getResultArray();
        $sk_tkpkp_kab_pembangunan_belum = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('sk_tkpkp_kab_pembangunan', 'BELUM')->get()->getResultArray();

        $kp_cilacap = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.01')->get()->getResultArray();
        $kp_banyumas = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.02')->get()->getResultArray();
        $kp_purbalingga = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.03')->get()->getResultArray();
        $kp_banjarnegara = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.04')->get()->getResultArray();
        $kp_kebumen = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.05')->get()->getResultArray();
        $kp_purworejo = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.06')->get()->getResultArray();
        $kp_wonosobo = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.07')->get()->getResultArray();
        $kp_magelang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.08')->get()->getResultArray();
        $kp_boyolali = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.09')->get()->getResultArray();
        $kp_klaten = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.10')->get()->getResultArray();
        $kp_sukoharjo = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.11')->get()->getResultArray();
        $kp_wonogiri = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.12')->get()->getResultArray();
        $kp_karanganyar = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.13')->get()->getResultArray();
        $kp_sragen = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.14')->get()->getResultArray();
        $kp_grobogan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.15')->get()->getResultArray();
        $kp_blora = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.16')->get()->getResultArray();
        $kp_rembang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.17')->get()->getResultArray();
        $kp_pati = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.18')->get()->getResultArray();
        $kp_kudus = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.19')->get()->getResultArray();
        $kp_jepara = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.20')->get()->getResultArray();
        $kp_demak = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.21')->get()->getResultArray();
        $kp_semarang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.22')->get()->getResultArray();
        $kp_temanggung = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.23')->get()->getResultArray();
        $kp_kendal = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.24')->get()->getResultArray();
        $kp_batang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.25')->get()->getResultArray();
        $kp_pekalongan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.26')->get()->getResultArray();
        $kp_pemalang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.27')->get()->getResultArray();
        $kp_tegal = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.28')->get()->getResultArray();
        $kp_brebes = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->where('kd_kab', '33.29')->get()->getResultArray();

        $verif_kp_cilacap = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.01'])->getResultArray();
        $verif_kp_banyumas = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.02'])->getResultArray();
        $verif_kp_purbalingga = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.03'])->getResultArray();
        $verif_kp_banjarnegara = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.04'])->getResultArray();
        $verif_kp_kebumen = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.05'])->getResultArray();
        $verif_kp_purworejo = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.06'])->getResultArray();
        $verif_kp_wonosobo = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.07'])->getResultArray();
        $verif_kp_magelang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.08'])->getResultArray();
        $verif_kp_boyolali = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.09'])->getResultArray();
        $verif_kp_klaten = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.10'])->getResultArray();
        $verif_kp_sukoharjo = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.11'])->getResultArray();
        $verif_kp_wonogiri = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.12'])->getResultArray();
        $verif_kp_karanganyar = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.13'])->getResultArray();
        $verif_kp_sragen = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.14'])->getResultArray();
        $verif_kp_grobogan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.15'])->getResultArray();
        $verif_kp_blora = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.16'])->getResultArray();
        $verif_kp_rembang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.17'])->getResultArray();
        $verif_kp_pati = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.18'])->getResultArray();
        $verif_kp_kudus = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.19'])->getResultArray();
        $verif_kp_jepara = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.20'])->getResultArray();
        $verif_kp_demak = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.21'])->getResultArray();
        $verif_kp_semarang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.22'])->getResultArray();
        $verif_kp_temanggung = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.23'])->getResultArray();
        $verif_kp_kendal = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.24'])->getResultArray();
        $verif_kp_batang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.25'])->getResultArray();
        $verif_kp_pekalongan = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.26'])->getResultArray();
        $verif_kp_pemalang = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.27'])->getResultArray();
        $verif_kp_tegal = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.28'])->getResultArray();
        $verif_kp_brebes = $this->db->table('sikaperdes_kawasan_bank_data')->select('kd_kab, kd_kawasan')->distinct()->getWhere(['verifikasi' => 'disetujui', 'kd_kab' => '33.29'])->getResultArray();

        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Dashboard', 'li_1' => 'Admin', 'li_2' => 'Dashboard']),
            'klasifikasi_ptp' => count($klasifikasi_ptp),
            'klasifikasi_wisata' => count($klasifikasi_wisata),
            'klasifikasi_perkebunan' => count($klasifikasi_perkebunan),
            'klasifikasi_perikanan' => count($klasifikasi_perikanan),
            'klasifikasi_peternakan' => count($klasifikasi_peternakan),
            'klasifikasi_ir' => count($klasifikasi_ir),
            'agregat_kp2016' => count($agregat_kp2016),
            'agregat_kp2017' => count($agregat_kp2017),
            'agregat_kp2018' => count($agregat_kp2018),
            'agregat_kp2019' => count($agregat_kp2019),
            'agregat_kp2020' => count($agregat_kp2020),
            'agregat_kp2021' => count($agregat_kp2021),
            'agregat_kp2022' => count($agregat_kp2022),
            'agregat_kp2023' => count($agregat_kp2023),
            'agregat_kp2024' => count($agregat_kp2024),
            'agregat_kp2025' => count($agregat_kp2025),
            'agregat_kp2026' => count($agregat_kp2026),
            'agregat_kp2027' => count($agregat_kp2027),
            'agregat_kp2028' => count($agregat_kp2028),
            'agregat_kp2029' => count($agregat_kp2029),
            'agregat_kp2030' => count($agregat_kp2030),
            'agregat_ds2016' => count($agregat_ds2016),
            'agregat_ds2017' => count($agregat_ds2017),
            'agregat_ds2018' => count($agregat_ds2018),
            'agregat_ds2019' => count($agregat_ds2019),
            'agregat_ds2020' => count($agregat_ds2020),
            'agregat_ds2021' => count($agregat_ds2021),
            'agregat_ds2022' => count($agregat_ds2022),
            'agregat_ds2023' => count($agregat_ds2023),
            'agregat_ds2024' => count($agregat_ds2024),
            'agregat_ds2025' => count($agregat_ds2025),
            'agregat_ds2026' => count($agregat_ds2026),
            'agregat_ds2027' => count($agregat_ds2027),
            'agregat_ds2028' => count($agregat_ds2028),
            'agregat_ds2029' => count($agregat_ds2029),
            'agregat_ds2030' => count($agregat_ds2030),
            'sk_lokasi_kawasan' => count($sk_lokasi_kawasan),
            'sk_lokasi_kawasan_belum' => count($sk_lokasi_kawasan_belum),
            'sk_tkpkp_kawasan' => count($sk_tkpkp_kawasan),
            'sk_tkpkp_kawasan_belum' => count($sk_tkpkp_kawasan_belum),
            'perbup_rpkp' => count($perbup_rpkp),
            'perbup_rpkp_belum' => count($perbup_rpkp_belum),
            'perda_kab_pembangunan' => count($perda_kab_pembangunan),
            'perda_kab_pembangunan_belum' => count($perda_kab_pembangunan_belum),
            'perbup_pembangunan' => count($perbup_pembangunan),
            'perbup_pembangunan_belum' => count($perbup_pembangunan_belum),
            'sk_tkpkp_kab_pembangunan' => count($sk_tkpkp_kab_pembangunan),
            'sk_tkpkp_kab_pembangunan_belum' => count($sk_tkpkp_kab_pembangunan_belum),
            'kp_cilacap' => count($kp_cilacap),
            'kp_banyumas' => count($kp_banyumas),
            'kp_purbalingga' => count($kp_purbalingga),
            'kp_banjarnegara' => count($kp_banjarnegara),
            'kp_kebumen' => count($kp_kebumen),
            'kp_purworejo' => count($kp_purworejo),
            'kp_wonosobo' => count($kp_wonosobo),
            'kp_magelang' => count($kp_magelang),
            'kp_boyolali' => count($kp_boyolali),
            'kp_klaten' => count($kp_klaten),
            'kp_sukoharjo' => count($kp_sukoharjo),
            'kp_wonogiri' => count($kp_wonogiri),
            'kp_karanganyar' => count($kp_karanganyar),
            'kp_sragen' => count($kp_sragen),
            'kp_grobogan' => count($kp_grobogan),
            'kp_blora' => count($kp_blora),
            'kp_rembang' => count($kp_rembang),
            'kp_pati' => count($kp_pati),
            'kp_kudus' => count($kp_kudus),
            'kp_jepara' => count($kp_jepara),
            'kp_demak' => count($kp_demak),
            'kp_semarang' => count($kp_semarang),
            'kp_temanggung' => count($kp_temanggung),
            'kp_kendal' => count($kp_kendal),
            'kp_batang' => count($kp_batang),
            'kp_pekalongan' => count($kp_pekalongan),
            'kp_pemalang' => count($kp_pemalang),
            'kp_tegal' => count($kp_tegal),
            'kp_brebes' => count($kp_brebes),
            'kp_cilacap' => count($kp_cilacap),
            'kp_banyumas' => count($kp_banyumas),
            'kp_purbalingga' => count($kp_purbalingga),
            'kp_banjarnegara' => count($kp_banjarnegara),
            'kp_kebumen' => count($kp_kebumen),
            'kp_purworejo' => count($kp_purworejo),
            'kp_wonosobo' => count($kp_wonosobo),
            'kp_magelang' => count($kp_magelang),
            'kp_boyolali' => count($kp_boyolali),
            'kp_klaten' => count($kp_klaten),
            'kp_sukoharjo' => count($kp_sukoharjo),
            'kp_wonogiri' => count($kp_wonogiri),
            'kp_karanganyar' => count($kp_karanganyar),
            'kp_sragen' => count($kp_sragen),
            'kp_grobogan' => count($kp_grobogan),
            'kp_blora' => count($kp_blora),
            'kp_rembang' => count($kp_rembang),
            'kp_pati' => count($kp_pati),
            'kp_kudus' => count($kp_kudus),
            'kp_jepara' => count($kp_jepara),
            'kp_demak' => count($kp_demak),
            'kp_semarang' => count($kp_semarang),
            'kp_temanggung' => count($kp_temanggung),
            'kp_kendal' => count($kp_kendal),
            'kp_batang' => count($kp_batang),
            'kp_pekalongan' => count($kp_pekalongan),
            'kp_pemalang' => count($kp_pemalang),
            'kp_tegal' => count($kp_tegal),
            'kp_brebes' => count($kp_brebes),
            'verif_kp_cilacap' => count($verif_kp_cilacap),
            'verif_kp_banyumas' => count($verif_kp_banyumas),
            'verif_kp_purbalingga' => count($verif_kp_purbalingga),
            'verif_kp_banjarnegara' => count($verif_kp_banjarnegara),
            'verif_kp_kebumen' => count($verif_kp_kebumen),
            'verif_kp_purworejo' => count($verif_kp_purworejo),
            'verif_kp_wonosobo' => count($verif_kp_wonosobo),
            'verif_kp_magelang' => count($verif_kp_magelang),
            'verif_kp_boyolali' => count($verif_kp_boyolali),
            'verif_kp_klaten' => count($verif_kp_klaten),
            'verif_kp_sukoharjo' => count($verif_kp_sukoharjo),
            'verif_kp_wonogiri' => count($verif_kp_wonogiri),
            'verif_kp_karanganyar' => count($verif_kp_karanganyar),
            'verif_kp_sragen' => count($verif_kp_sragen),
            'verif_kp_grobogan' => count($verif_kp_grobogan),
            'verif_kp_blora' => count($verif_kp_blora),
            'verif_kp_rembang' => count($verif_kp_rembang),
            'verif_kp_pati' => count($verif_kp_pati),
            'verif_kp_kudus' => count($verif_kp_kudus),
            'verif_kp_jepara' => count($verif_kp_jepara),
            'verif_kp_demak' => count($verif_kp_demak),
            'verif_kp_semarang' => count($verif_kp_semarang),
            'verif_kp_temanggung' => count($verif_kp_temanggung),
            'verif_kp_kendal' => count($verif_kp_kendal),
            'verif_kp_batang' => count($verif_kp_batang),
            'verif_kp_pekalongan' => count($verif_kp_pekalongan),
            'verif_kp_pemalang' => count($verif_kp_pemalang),
            'verif_kp_tegal' => count($verif_kp_tegal),
            'verif_kp_brebes' => count($verif_kp_brebes),
            'verif_kp_cilacap' => count($verif_kp_cilacap),
            'verif_kp_banyumas' => count($verif_kp_banyumas),
            'verif_kp_purbalingga' => count($verif_kp_purbalingga),
            'verif_kp_banjarnegara' => count($verif_kp_banjarnegara),
            'verif_kp_kebumen' => count($verif_kp_kebumen),
            'verif_kp_purworejo' => count($verif_kp_purworejo),
            'verif_kp_wonosobo' => count($verif_kp_wonosobo),
            'verif_kp_magelang' => count($verif_kp_magelang),
            'verif_kp_boyolali' => count($verif_kp_boyolali),
            'verif_kp_klaten' => count($verif_kp_klaten),
            'verif_kp_sukoharjo' => count($verif_kp_sukoharjo),
            'verif_kp_wonogiri' => count($verif_kp_wonogiri),
            'verif_kp_karanganyar' => count($verif_kp_karanganyar),
            'verif_kp_sragen' => count($verif_kp_sragen),
            'verif_kp_grobogan' => count($verif_kp_grobogan),
            'verif_kp_blora' => count($verif_kp_blora),
            'verif_kp_rembang' => count($verif_kp_rembang),
            'verif_kp_pati' => count($verif_kp_pati),
            'verif_kp_kudus' => count($verif_kp_kudus),
            'verif_kp_jepara' => count($verif_kp_jepara),
            'verif_kp_demak' => count($verif_kp_demak),
            'verif_kp_semarang' => count($verif_kp_semarang),
            'verif_kp_temanggung' => count($verif_kp_temanggung),
            'verif_kp_kendal' => count($verif_kp_kendal),
            'verif_kp_batang' => count($verif_kp_batang),
            'verif_kp_pekalongan' => count($verif_kp_pekalongan),
            'verif_kp_pemalang' => count($verif_kp_pemalang),
            'verif_kp_tegal' => count($verif_kp_tegal),
            'verif_kp_brebes' => count($verif_kp_brebes),
        ];

        return view('sikaperdes/user/admin/dashboard', $data);
    }

    public function role_management()
    {
        $this->session->remove('keywordapi');
        $builder = $this->db->table('sikaperdes_primary_user');

        $filtkabupaten = '';
        $filtkecamatan = '';
        $filtkeldesa = '';
        if (isset($_POST['filter'])) {
            $filtkabupaten = $this->request->getPost('filtkabupaten');
            $filtkecamatan = $this->request->getPost('filtkecamatan');
            $filtkeldesa = $this->request->getPost('filtkeldesa');
        }

        $data = [
            'title' => 'Role',
            'user' => $builder->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'rolak' => $this->db->table('sikaperdes_primary_role')->getWhere(['id' => $this->session->get('role_id_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Role Management', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'listKabupaten' => $this->Filterdatakabupaten_model->select('kd_wilayah, akses')->where('kd_wilayah !=', '2')->orderBy('kd_wilayah')->findAll(),
            'listKecamatan' => $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->where('id_kab', $filtkabupaten)->orderBy('kd_wilayah')->findAll(),
            'listKeldesa' => $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->where('id_kec', $filtkecamatan)->orderBy('kd_wilayah')->findAll(),
            'filtkabupaten' => $filtkabupaten,
            'filtkecamatan' => $filtkecamatan,
            'filtkeldesa' => $filtkeldesa,
        ];

        return view('sikaperdes/user/admin/rolemanagement', $data);
    }

    public function ajaxserverSide_rolemanagement()
    {
        $csrfName = csrf_token();
        $csrfHash = csrf_hash();

        $filtkabupaten = $this->request->getPost('filtkabupaten');
        $filtkecamatan = $this->request->getPost('filtkecamatan');
        $filtkeldesa = $this->request->getPost('filtkeldesa');
        $param['draw'] = isset($_REQUEST['draw']) ? $_REQUEST['draw'] : '';
        $order = isset($_REQUEST['order']) ? $_REQUEST['order'] : '';
        $length = isset($_REQUEST['length']) ? $_REQUEST['length'] : '';
        $start = isset($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $search_value = isset($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';

        $listing = $this->Admin_model->defaultgetRole($search_value, $order, $length, $start, $filtkabupaten, $filtkecamatan, $filtkeldesa);
        $recordsTotal = $this->Admin_model->recordsTotal();
        $recordsFiltered = $this->Admin_model->recordsFiltered($search_value, $filtkabupaten, $filtkecamatan, $filtkeldesa);

        $data = array();
        $no = $start;
        foreach ($listing as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key['nama'];
            $row[] = $key['kd_login'];
            $row[] = $key['opd'];
            $row[] = $key['ampuan'];
            $row[] = $key['akses'];
            $row[] = $key['tk_instansi'];
            if ($this->session->get('kd_login_sikaperdes') == "10101010101010") {
                $row[] = '<a href="role_edit/' . $key['user_id'] . '' . "/" . '' . $key['kd_wilayah'] . '" class="badge bg-info">Edit</a> <a href="role_access/' . $key['role_id'] . '" class="badge bg-warning">Configure</a>';
            }
            $data[] = $row;
        }

        $json_data = array(
            'draw' => intval($param['draw']),
            'recordsTotal' => count($recordsTotal),
            'recordsFiltered' => $recordsFiltered['jml'],
            'data' => $data,
            $csrfName => $csrfHash,
        );

        return $this->response->setJSON($json_data);
    }

    public function ajaxfiltkecamatan()
    {
        $filtkabupaten = $this->request->getVar('filtkabupaten');
        if ($this->request->getVar('searchTerm')) {
            $listKecamatan = $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->where('id_kab', $filtkabupaten)->like('akses', $this->request->getVar('searchTerm'))->orLike('kd_wilayah', $this->request->getVar('searchTerm'))->orderBy('kd_wilayah')->findAll();
        } else {
            $listKecamatan = $this->Filterdatakecamatan_model->select('kd_wilayah, akses')->where('id_kab', $filtkabupaten)->orderBy('kd_wilayah')->findAll();
        }
        $data = [];
        foreach ($listKecamatan as $lkec) {
            $data[] = [
                'id' => $lkec['kd_wilayah'],
                'text' => $lkec['kd_wilayah'] . ' - ' . $lkec['akses']
            ];
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function ajaxfiltkeldesa()
    {
        $filtkecamatan = $this->request->getVar('filtkecamatan');
        if ($this->request->getVar('searchTerm')) {
            $listKeldesa = $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->where('id_kec', $filtkecamatan)->like('akses', $this->request->getVar('searchTerm'))->orLike('kd_wilayah', $this->request->getVar('searchTerm'))->orderBy('kd_wilayah')->findAll();
        } else {
            $listKeldesa = $this->Filterdatakeldesa_model->select('kd_wilayah, akses')->where('id_kec', $filtkecamatan)->orderBy('kd_wilayah')->findAll();
        }
        $data = [];
        foreach ($listKeldesa as $lkdes) {
            $data[] = [
                'id' => $lkdes['kd_wilayah'],
                'text' => $lkdes['kd_wilayah'] . ' - ' . $lkdes['akses']
            ];
        }
        $response['data'] = $data;
        return $this->response->setJSON($response);
    }

    public function role_edit($user_id, $kd_wilayah)
    {
        $this->session->remove('keywordapi');
        $editrole = $this->db->table('sikaperdes_primary_role');
        $editrole->where('id !=', 1);

        $data = [
            'title' => 'Role',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Role Edit', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'edit' => $this->db->table('sikaperdes_primary_user')->getWhere(['user_id' => $user_id])->getRowArray(),
            'tabrole' => $editrole->get()->getResultArray(),
            'permendagri' => $this->db->table('sikaperdes_rm_admin')->where('kd_wilayah', $kd_wilayah)->orderBy('id_prov ASC')->get()->getRowArray(),
            'roleedit' => $this->db->table('sikaperdes_rm_admin')->select(['kd_wilayah', 'role', 'akses'])->orderBy('id_prov ASC')->get()->getResultArray(),
            'tabactive' => $this->db->table('sikaperdes_primary_is_active')->get()->getResultArray()
        ];

        $this->validation->setRule('id', 'Id', 'trim|required', ['required' => 'Id tidak boleh dikosongkan']);
        if ($this->validation->withRequest($this->request)->run()) {
            $userupdate = $this->db->table('sikaperdes_primary_user');
            $userupdatedata = [
                "kd_wilayah" => $this->request->getVar('idpermendagri'),
                "role_id" => $this->request->getVar('role'),
                "is_active" => $this->request->getVar('is_active')
            ];
            $flash = '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>Role <b>' . $data['edit']['nama'] . '</b> Berhasil diubah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            $userupdate->where('user_id', $this->request->getVar('id'));
            $userupdate->update($userupdatedata);

            $this->session->setFlashdata('message', $flash);
            return redirect()->to('user/admin/role_management');
        } else {
            return view('sikaperdes/user/admin/role-edit', $data);
        }
    }

    public function role_access($role_id)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $tabmenu = $this->db->table('sikaperdes_primary_user_menu');
        $tabmenu->where('id !=', 1);

        $data = [
            'title' => 'Role',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Konfigurasi Akses Menu', 'li_1' => 'Admin', 'li_2' => 'Role Management']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'role' => $this->db->table('sikaperdes_primary_role')->getWhere(['id' => $role_id])->getRowArray(),
            'kd_login' => $this->db->table('sikaperdes_primary_user')->getWhere(['role_id' => $role_id])->getRowArray(),
            'menu' => $tabmenu->get()->getResultArray(),
        ];
        return view('sikaperdes/user/admin/role-access', $data);
    }

    public function changeAccess()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $menu_id = $this->request->getVar('menuId');
        $role_id = $this->request->getVar('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->table('sikaperdes_primary_user_access_menu');
        $result->where($data);
        if ($result->countAllResults() < 1) {
            $result->insert($data);
        } else {
            $result->delete($data);
        }
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Akses menu</b> Berhasil dikonfigurasi<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
    }

    public function profile()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');

        $data = [
            'title' => 'Profile',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Profile', 'li_1' => 'Admin', 'li_2' => 'Profile']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
        ];

        return view('sikaperdes/user/admin/profile', $data);
    }

    public function editprofile()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $data = [
            'title' => 'Edit Profile',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Edit Profile', 'li_1' => 'Admin', 'li_2' => 'Edit Profile']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/editprofile')->withInput();
            }
            if ($data['user']['email'] == '') {
                $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[sikaperdes_primary_user.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
                if (!$this->validation->withRequest($this->request)->run()) {
                    return redirect()->to('user/admin/editprofile')->withInput();
                }
            }
            if ($data['user']['hp'] == '') {
                $this->validation->setRule('hp', 'HP', 'required|alpha_numeric_punct|min_length[11]|max_length[15]|trim|is_unique[sikaperdes_primary_user.hp]', ['required' => 'Nomor HP tidak boleh kosong', 'alpha_numeric_punch' => 'Nomor HP hanya diisi angka (tanpa spasi)', 'min_length' => 'Nomor HP minimal harus 11 digit', 'max_length' => 'Nomor HP maximal hanya 15 digit', 'is_unique' => 'Nomor HP sudah terdaftar']);
                if (!$this->validation->withRequest($this->request)->run()) {
                    return redirect()->to('user/admin/editprofile')->withInput();
                }
            }
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_sikaperdes');
                $this->Admin_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/admin/profile');
            }
        }
        return view('sikaperdes/user/admin/editprofile', $data);
    }

    public function editemail()
    {
        $userid = $this->request->getVar('userid');
        $email = $this->request->getVar('email');

        $builder = $this->db->table('sikaperdes_primary_user');
        $builder->set('email', $email);
        $builder->where('user_id', $userid);
        $builder->update();
    }

    public function edithp()
    {
        $userid = $this->request->getVar('userid');
        $hp = $this->request->getVar('hp');

        $builder = $this->db->table('sikaperdes_primary_user');
        $builder->set('hp', $hp);
        $builder->where('user_id', $userid);
        $builder->update();
    }

    public function changepassword()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $data = [
            'title' => 'Ganti Password',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Ganti Password', 'li_1' => 'Admin', 'li_2' => 'Ganti Password']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('current_password', 'Current Password', 'required|trim', ['required' => 'Form tidak boleh dikosongkan']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/ganti_password')->withInput();
            }
            $this->validation->setRule('new_password1', 'New Password', 'required|trim|min_length[6]', ['required' => 'Form tidak boleh dikosongkan', 'min_length' => 'Password minimal 6 karakter']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/ganti_password')->withInput();
            }
            $this->validation->setRule('new_password2', 'New Password2', 'trim|matches[new_password1]', ['matches' => 'Input tidak sesuai dengan password baru']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/admin/ganti_password')->withInput();
            } else {
                $current_password = $this->request->getVar('current_password');
                $new_password = password_hash($this->request->getVar('new_password1'), PASSWORD_DEFAULT);
                if (!password_verify($current_password, $data['user']['password'])) {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Gagal! Password awal tidak sesuai!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect()->to('user/admin/ganti_password')->withInput();
                } else {
                    if (password_verify($current_password, $new_password)) {
                        $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Gagal! Password ini telah digunakan sebelumnya<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        return redirect()->to('user/admin/ganti_password')->withInput();
                    } else {
                        $builder = $this->db->table('sikaperdes_primary_user');
                        $builder->set('password', $new_password);
                        $builder->where('user_id', $this->session->get('id_sikaperdes'));
                        $builder->update();
                        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Password</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        return redirect()->to('user/admin/ganti_password');
                    }
                }
            }
        }
        return view('sikaperdes/user/admin/ganti-password', $data);
    }

    public function registrasi_api()
    {
        $this->session->remove('keyword');
        $start = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        if (isset($_POST['tombolcari'])) {
            $cari = $this->request->getVar('keyword');
            $this->session->set('keyword', $cari);
        } else {
            $cari = $this->session->get('keyword');
        }

        if ($cari) {
            $get_role = $this->Regapi_model->getApiUser($cari);
        } else {
            $get_role = $this->Regapi_model->defaultgetApiUser();
        }

        $data = [
            'title' => 'Registrasi API',
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'rolak' => $this->db->table('sikaperdes_primary_role')->getWhere(['id' => $this->session->get('role_id_sikaperdes')])->getRowArray(),
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Registrasi User API', 'li_1' => 'Admin', 'li_2' => 'Registrasi User API']),
            'start' => $start,
            'getrole' => $get_role->paginate(5, 'sikaperdes_auth_api_key'),
            'validation' =>  $this->validation
        ];

        if ($cari) {
            $data['total_rows'] = $this->Regapi_model->getApiUser($cari)->countAllResults();
        } else {
            $data['total_rows'] = $this->Regapi_model->defaultgetApiUser()->countAllResults();
        }

        return view('sikaperdes/user/admin/registerapi', $data);
    }

    public function register_api()
    {
        $email = $this->request->getVar('email');

        $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[sikaperdes_auth_api_key.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
        $this->validation->setRule('aplication', 'Aplication', 'required|trim', ['required' => 'Nama aplikasi tidak boleh kosong']);
        $this->validation->setRule('password', 'Password', 'required|trim|min_length[6]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password minimal 6 digit']);
        if ($this->validation->withRequest($this->request)->run()) {
            $input = [
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'aplication' => $this->request->getVar('aplication'),
                'created' => time()
            ];
            $builder = $this->db->table('sikaperdes_auth_api_key');
            $builder->insert($input);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>' . $email . ' telah <b>diregistrasi!</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect('user/admin/registrasi_api');
        } else {
            $validation = $this->validation;
            $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Registrasi gagal: Periksa kembali inputan Anda masih ada yang salah!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('user/admin/registrasi_api')->with('validation', $validation);
        }
    }

    public function hapusUserApi($id)
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        $hapus = $this->db->table('sikaperdes_auth_api_key');
        $hapus->delete(['id' => $id]);
        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i>User berhasil dihapus!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        return redirect()->to('user/admin/registrasi_api');
    }

    public function hapussessionkeywordapi()
    {
        $this->session->remove('keyword');
        $this->session->remove('keywordapi');
        return redirect()->to('user/admin/registrasi_api');
    }
}
