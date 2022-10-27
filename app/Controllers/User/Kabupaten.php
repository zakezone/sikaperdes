<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Kabupaten\User_kabupaten_model;
use App\Models\Filterdatadukcapil\Filtkabupaten;
use App\Models\Filterdatadukcapil\Filtkecamatan;
use App\Models\Filterdatadukcapil\Filtkeldesa;

class Kabupaten extends BaseController
{
    protected $Kabupaten_model;
    protected $Filterdatakabupaten_model;
    protected $Filterdatakecamatan_model;
    protected $Filterdatakeldesa_model;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->Kabupaten_model = new User_kabupaten_model();
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

        return view('sikaperdes/user/kabupaten/dashboard', $data);
    }

    public function profile()
    {
        $this->session->remove('keyword');

        $data = [
            'title' => 'Profile',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Profile', 'li_1' => 'Kabupaten', 'li_2' => 'Profile']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
        ];

        return view('sikaperdes/user/kabupaten/profile', $data);
    }

    public function editprofile()
    {
        $this->session->remove('keyword');
        $data = [
            'title' => 'Edit Profile',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Edit Profile', 'li_1' => 'Kabupaten', 'li_2' => 'Edit Profile']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('nama', 'Nama lengkap', 'trim|required', ['required' => 'Form tidak boleh dikosongkan']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/kabupaten/editprofile')->withInput();
            }
            if ($data['user']['email'] == '') {
                $this->validation->setRule('email', 'Email', 'required|trim|valid_email|is_unique[sikaperdes_primary_user.email]', ['required' => 'Email tidak boleh kosong', 'valid_email' => 'Format email tidak sesuai', 'is_unique' => 'Email sudah terdaftar']);
                if (!$this->validation->withRequest($this->request)->run()) {
                    return redirect()->to('user/kabupaten/editprofile')->withInput();
                }
            }
            if ($data['user']['hp'] == '') {
                $this->validation->setRule('hp', 'HP', 'required|alpha_numeric_punct|min_length[11]|max_length[15]|trim|is_unique[sikaperdes_primary_user.hp]', ['required' => 'Nomor HP tidak boleh kosong', 'alpha_numeric_punch' => 'Nomor HP hanya diisi angka (tanpa spasi)', 'min_length' => 'Nomor HP minimal harus 11 digit', 'max_length' => 'Nomor HP maximal hanya 15 digit', 'is_unique' => 'Nomor HP sudah terdaftar']);
                if (!$this->validation->withRequest($this->request)->run()) {
                    return redirect()->to('user/kabupaten/editprofile')->withInput();
                }
            }
            $this->validation->setRule('image', 'Upload Persetujuan', 'trim|mime_in[image,image/jpg,image/JPG,image/jpeg,image/png]|max_size[image,2048]', ['mime_in' => 'File yang anda pilih bukan JPG', 'max_size' => 'File anda melebihi 2mb']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/kabupaten/editprofile')->withInput();
            } else {
                $file = $this->request->getFile('image');
                $input = $this->request->getVar();
                $user_id = $this->session->get('id_sikaperdes');
                $this->Kabupaten_model->editProfile($user_id, $input, $file);
                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Profile</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->to('user/kabupaten/profile');
            }
        }
        return view('sikaperdes/user/kabupaten/editprofile', $data);
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
        $data = [
            'title' => 'Ganti Password',
            'page_title' => view('sikaperdes/layout/user/content-page-title', ['title' => 'Ganti Password', 'li_1' => 'Kabupaten', 'li_2' => 'Ganti Password']),
            'user' => $this->db->table('sikaperdes_primary_user')->getWhere(['kd_login' => $this->session->get('kd_login_sikaperdes')])->getRowArray(),
            'validation' =>  $this->validation
        ];

        if (isset($_POST['submit'])) {
            $this->validation->setRule('current_password', 'Current Password', 'required|trim', ['required' => 'Form tidak boleh dikosongkan']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/kabupaten/ganti_password')->withInput();
            }
            $this->validation->setRule('new_password1', 'New Password', 'required|trim|min_length[6]', ['required' => 'Form tidak boleh dikosongkan', 'min_length' => 'Password minimal 6 karakter']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/kabupaten/ganti_password')->withInput();
            }
            $this->validation->setRule('new_password2', 'New Password2', 'trim|matches[new_password1]', ['matches' => 'Input tidak sesuai dengan password baru']);
            if (!$this->validation->withRequest($this->request)->run()) {
                return redirect()->to('user/kabupaten/ganti_password')->withInput();
            } else {
                $current_password = $this->request->getVar('current_password');
                $new_password = password_hash($this->request->getVar('new_password1'), PASSWORD_DEFAULT);
                if (!password_verify($current_password, $data['user']['password'])) {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-block-helper label-icon"></i>Gagal! Password awal tidak sesuai!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    return redirect()->to('user/kabupaten/ganti_password')->withInput();
                } else {
                    if (password_verify($current_password, $new_password)) {
                        $this->session->setFlashdata('message', '<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-alert-outline label-icon"></i>Gagal! Password ini telah digunakan sebelumnya<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        return redirect()->to('user/kabupaten/ganti_password')->withInput();
                    } else {
                        $builder = $this->db->table('sikaperdes_primary_user');
                        $builder->set('password', $new_password);
                        $builder->where('user_id', $this->session->get('id_sikaperdes'));
                        $builder->update();
                        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert"><i class="mdi mdi-check-all label-icon"></i><b>Password</b> Berhasil diperbarui<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        return redirect()->to('user/kabupaten/ganti_password');
                    }
                }
            }
        }
        return view('sikaperdes/user/kabupaten/ganti-password', $data);
    }
}
